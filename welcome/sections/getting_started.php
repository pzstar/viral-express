<?php
$viral_express_steps = $this->setup_steps();
$viral_express_done = count(wp_list_filter($viral_express_steps, array('done' => true)));
$viral_express_percent = round(100 * $viral_express_done / count($viral_express_steps));
?>
<div class="welcome-grid welcome-grid-start">
    <div class="welcome-card welcome-setup-checklist">
        <div class="welcome-setup-head">
            <div class="welcome-ring" style="--welcome-progress:<?php echo absint($viral_express_percent); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="<?php echo count($viral_express_steps); ?>" aria-valuenow="<?php echo absint($viral_express_done); ?>" aria-label="<?php esc_attr_e('Setup progress', 'viral-express'); ?>">
                <span><?php echo absint($viral_express_percent); ?>%</span>
            </div>
            <div>
                <h3><?php esc_html_e('Set Up Your Website', 'viral-express'); ?></h3>
                <p class="welcome-setup-count"><?php /* translators: 1: steps done, 2: all steps */ printf(esc_html__('%1$d of %2$d done', 'viral-express'), $viral_express_done, count($viral_express_steps)); ?></p>
            </div>
        </div>

        <ol class="welcome-setup-steps">
            <?php foreach ($viral_express_steps as $viral_express_step) { ?>
                <li class="<?php echo $viral_express_step['done'] ? 'is-done' : 'is-todo'; ?>">
                    <span class="welcome-setup-mark dashicons <?php echo $viral_express_step['done'] ? 'dashicons-yes' : ''; ?>" aria-hidden="true"></span>
                    <div class="welcome-setup-text">
                        <strong><?php echo esc_html($viral_express_step['title']); ?></strong>
                        <span class="screen-reader-text"><?php echo $viral_express_step['done'] ? esc_html__('(done)', 'viral-express') : esc_html__('(to do)', 'viral-express'); ?></span>
                        <p><?php echo esc_html($viral_express_step['text']); ?></p>
                    </div>
                    <?php
                    if ($viral_express_step['url']) {
                        echo '<a class="button' . ($viral_express_step['done'] ? '' : ' button-primary') . '" href="' . esc_url($viral_express_step['url']) . '">' . ($viral_express_step['done'] ? esc_html__('Change', 'viral-express') : esc_html__('Set up', 'viral-express')) . '</a>';
                    } elseif (!$viral_express_step['done']) {
                        echo $this->generate_hdi_install_button();
                    }
                    ?>
                </li>
            <?php } ?>
        </ol>
    </div>

    <div class="welcome-card welcome-demo-import">
        <div class="welcome-demo-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php /* translators: %s: theme name */ printf(esc_attr__('%s Demo', 'viral-express'), $this->theme_name); ?>">
            <a href="https://demo.hashthemes.com/viral-express/" target="_blank" class="welcome-demo-view"><span class="dashicons dashicons-external" aria-hidden="true"></span><?php esc_html_e('View Demo', 'viral-express'); ?></a>
        </div>
        <div class="welcome-card-body">
            <h3><?php esc_html_e('Start From a Demo', 'viral-express'); ?></h3>
            <p><?php esc_html_e('Import a complete demo website, with its content and settings, in a single click, then replace the content with your own.', 'viral-express'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
            <p class="welcome-small"><a href="https://hashthemes.com/documentation/viral-express-documentation/#Import-Demo-Content" target="_blank"><?php esc_html_e('How the demo importer works', 'viral-express'); ?></a></p>
        </div>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Customize Your Site', 'viral-express'); ?></h3>
        <a href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php esc_html_e('Open the Customizer', 'viral-express'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <div class="welcome-quick-links">
        <?php foreach ($this->quick_links() as $viral_express_link) { ?>
            <a class="welcome-quick-link" href="<?php echo esc_url($viral_express_link['url']); ?>">
                <span class="dashicons <?php echo esc_attr($viral_express_link['icon']); ?>" aria-hidden="true"></span>
                <?php echo esc_html($viral_express_link['label']); ?>
            </a>
        <?php } ?>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Build Your Front Page', 'viral-express'); ?></h3>
        <a href="https://hashthemes.com/documentation/viral-express-documentation/#Home-Page-Setup" target="_blank"><?php esc_html_e('Step-by-step guide', 'viral-express'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <p class="welcome-block-intro"><?php echo esc_html__('Build the front page from the theme\'s ready-made news sections in the Customizer, or design it freely with Elementor.', 'viral-express'); ?></p>

    <div class="welcome-grid welcome-grid-2">
        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-admin-customizer" aria-hidden="true"></span>
            <h4><?php esc_html_e('With the Customizer', 'viral-express'); ?></h4>
            <ol>
                <li><?php echo sprintf(esc_html__('Go to Appearance > Customize > %s.', 'viral-express'), '<a href="' . esc_url(admin_url('customize.php?autofocus[section]=static_front_page')) . '">' . esc_html__('Homepage Settings', 'viral-express') . '</a>'); ?></li>
                <li><?php echo esc_html__('Turn on "Enable FrontPage".', 'viral-express'); ?></li>
                <li><?php echo esc_html__('Go back, open "Front Page Sections" and fill in the sections you want to show.', 'viral-express'); ?></li>
            </ol>
        </div>

        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-layout" aria-hidden="true"></span>
            <h4><?php esc_html_e('With Elementor', 'viral-express'); ?></h4>
            <ol>
                <li><?php printf(esc_html__('Install Elementor from Plugins > Add New, then Hash Elements from the %s.', 'viral-express'), '<a href="' . esc_url(admin_url('admin.php?page=viral-express-welcome&section=recommended_plugins')) . '">' . esc_html__('Recommended Plugins tab', 'viral-express') . '</a>'); ?></li>
                <li><?php echo esc_html__('Create a new page, edit it with Elementor and drag in the news widgets to design your front page.', 'viral-express'); ?></li>
                <li><?php echo sprintf(esc_html__('In Appearance > Customize > %s, choose "A static page", select your new page as the Homepage and turn off "Enable FrontPage".', 'viral-express'), '<a href="' . esc_url(admin_url('customize.php?autofocus[section]=static_front_page')) . '">' . esc_html__('Homepage Settings', 'viral-express') . '</a>'); ?></li>
            </ol>
        </div>
    </div>
</div>
