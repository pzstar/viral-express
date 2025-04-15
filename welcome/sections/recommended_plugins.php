<?php
$viral_express_free_plugins = $this->free_plugins;

if (!empty($viral_express_free_plugins)) {
    ?>
    <h3><?php echo esc_html__('Recommended Plugins', 'viral-express'); ?></h3>
    <p><?php echo esc_html__('Please install these free plugins. These plugins are complementary that adds more features to the theme.', 'viral-express'); ?></p>
    <div class="recomended-plugin-wrap">
        <?php
        foreach ($viral_express_free_plugins as $viral_express_plugin) {
            $viral_express_slug = $viral_express_plugin['slug'];
            $viral_express_name = $viral_express_plugin['name'];
            $viral_express_filename = $viral_express_plugin['filename'];
            $viral_express_thumb = $viral_express_plugin['thumb_path'];
            ?>
            <div class="recommended-plugins">
                <div class="plugin-image">
                    <img src="<?php echo esc_url($viral_express_thumb) ?>" />
                </div>

                <div class="plugin-title-wrap">
                    <div class="plugin-title">
                        <?php echo esc_html($viral_express_name); ?>
                    </div>

                    <div class="plugin-btn-wrapper">
                        <?php if ($this->check_plugin_installed_state($viral_express_slug, $viral_express_filename) && !$this->check_plugin_active_state($viral_express_slug, $viral_express_filename)): ?>
                            <a target="_blank" href="<?php echo esc_url($this->plugin_generate_url('active', $viral_express_slug, $viral_express_filename)) ?>" class="button button-primary"><?php esc_html_e('Activate', 'viral-express'); ?></a>
                        <?php elseif ($this->check_plugin_installed_state($viral_express_slug, $viral_express_filename)):
                            ?>
                            <button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e('Installed', 'viral-express'); ?></button>
                        <?php else:
                            ?>
                            <a target="_blank" class="install-now button-primary" href="<?php echo esc_url($this->plugin_generate_url('install', $viral_express_slug, $viral_express_filename)) ?>">
                                <?php esc_html_e('Install Now', 'viral-express'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>
    <?php
}