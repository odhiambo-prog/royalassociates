<?php
// Site configuration
return [
    'site_name' => 'Royal Associates Insurance',
    'base_url' => '',
    'assets_path' => '/assets',
    // Homepage hero background video. Hosted externally (Vimeo) to keep the
    // repo/ server light — the original 200MB local file is gitignored (*.mp4).
    // Use a Vimeo progressive_redirect URL (same pattern as careers/savings pages),
    // e.g. https://player.vimeo.com/progressive_redirect/playback/<ID>/rendition/1080p/file.mp4%20%281080p%29.mp4?loc=external&signature=<SIG>
    'hero_video_url' => 'https://player.vimeo.com/progressive_redirect/playback/REPLACE_WITH_VIDEO_ID/rendition/1080p/file.mp4%20%281080p%29.mp4?loc=external&signature=REPLACE_WITH_SIGNATURE',
];