#!/bin/bash
set -e

MAX_WAIT=60
DB_HOST="${DB_HOST:-mariadb}"

echo "Waiting for database connection..."
for i in $(seq 1 $MAX_WAIT); do
    if mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" -e "SELECT 1" >/dev/null 2>&1; then
        echo "Database ready."
        break
    fi
    echo "Waiting... ($i/$MAX_WAIT)"
    sleep 2
done

if ! mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" -e "SELECT 1" >/dev/null 2>&1; then
    echo "ERROR: Could not connect to database after ${MAX_WAIT} seconds."
    exit 1
fi

TABLE_COUNT=$(mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" -N -e \
    "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$DB_NAME'" 2>/dev/null || echo "0")

if [ "$TABLE_COUNT" = "0" ]; then
    echo "Empty database detected. Importing database.sql..."
    mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < /var/www/html/database.sql
    echo "Database import complete."
fi

if [ -n "$WP_ADMIN_PASSWORD" ] && wp core is-installed --allow-root 2>/dev/null; then
    echo "Setting admin password..."
    wp user update 1 --user_pass="$WP_ADMIN_PASSWORD" --allow-root 2>/dev/null || true
fi

if wp core is-installed --allow-root 2>/dev/null; then
    if [ -n "$WP_HOME" ]; then
        CURRENT_HOME=$(wp option get home --allow-root 2>/dev/null || echo "")
        if [ -n "$CURRENT_HOME" ] && [ "$CURRENT_HOME" != "$WP_HOME" ]; then
            echo "Updating site URL from $CURRENT_HOME to $WP_HOME..."
            wp search-replace "$CURRENT_HOME" "$WP_HOME" --allow-root --skip-columns=guid 2>/dev/null || true
        fi
    fi
fi

exec "$@"
