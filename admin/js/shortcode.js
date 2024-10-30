(function() {
	tinymce.create('tinymce.plugins.lead_magnet_button', {
        init: function(editor, url) {
            editor.addButton('lead_magnet_button', {
            	type: 'menubutton',
            	//text: 'My MCE Plugin',
				image : url + '/../images/lead-magnets-icon.png',
                icon: false,
                menu: [
				
                	{
	                	text: 'Attention',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('lm_shortcode01'); }
                	},
                	{
	                	text: 'Lead Magnet link',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('lm_shortcode02'); }
                	},
                	{
	                	text: 'Lead Magnet Popup',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('lm_shortcode03'); }
                	}
                ]
            });

            data = {};

            editor.addCommand('lm_shortcode01', function() {
                tinymce.execCommand('mceInsertContent', false, '[attention-lead-magnet] [/attention-lead-magnet]');
            });

            editor.addCommand('lm_shortcode02', function() {
                tinymce.execCommand('mceInsertContent', false, '[lead-magnet]Download ...[/lead-magnet]');
            });
			
            editor.addCommand('lm_shortcode03', function() {
                tinymce.execCommand('mceInsertContent', false, '[lead-magnet-popup title="Subscribe to unlock ..." subtitle="Where I can send ...?" spam_statement="I hate spam too, so I will never send such to you!" close="No, thanks"] INSERT THE SHORTCODE FOR YOUR NEWSLETTER FORM HERE [/lead-magnet-popup]');
            });
			
        },
        createControl: function(n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('lead_magnet_button', tinymce.plugins.lead_magnet_button);
})();