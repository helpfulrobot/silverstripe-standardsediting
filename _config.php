<?php

// TinyMCE configuration
$standardsEditor = HtmlEditorConfig::get('standards');

// Start with the same configuration as 'cms' config (defined in framework/admin/_config.php).
$standardsEditor->setOptions(array(
	'friendly_name' => 'Default Standards',
	'priority' => '60',
	'mode' => 'none',

	'body_class' => 'typography',
	'document_base_url' => Director::absoluteBaseURL(),

	'cleanup_callback' => "sapphiremce_cleanup",

	'use_native_selects' => false,
	'valid_elements' => "@[id|class|style|title],a[id|rel|rev|dir|tabindex|accesskey|type|name|href|target|title"
		. "|class],-strong/-b[class],-em/-i[class],-strike[class],-u[class],#p[id|dir|class|align|style],-ol[class],"
		. "-ul[class],-li[class],br,img[id|dir|longdesc|usemap|class|src|border|alt=|title|width|height|align|data*],"
		. "-sub[class],-sup[class],-blockquote[dir|class],"
		. "-table[cellspacing|cellpadding|width|height|class|align|dir|id|style],"
		. "-tr[id|dir|class|rowspan|width|height|align|valign|bgcolor|background|bordercolor|style],"
		. "tbody[id|class|style],thead[id|class|style],tfoot[id|class|style],"
		. "#td[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style|headers],"
		. "-th[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style|headers],caption[id|dir|class],"
		. "-div[id|dir|class|align|style],-span[class|align|style],-pre[class|align],address[class|align],"
		. "-h1[id|dir|class|align|style],-h2[id|dir|class|align|style],-h3[id|dir|class|align|style],"
		. "-h4[id|dir|class|align|style],-h5[id|dir|class|align|style],-h6[id|dir|class|align|style],hr[class],"
		. "dd[id|class|title|dir],dl[id|class|title|dir],dt[id|class|title|dir],@[id,style,class]",
	'extended_valid_elements' =>
		'img[class|src|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|usemap|data*],'
		. 'object[classid|codebase|width|height|data|type],'
		. 'embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage|autoplay],'
		. 'param[name|value],'
		. 'map[class|name|id],'
		. 'area[shape|coords|href|target|alt],'
		. 'ins[cite|datetime],del[cite|datetime],'
		. 'menu[label|type],'
		. 'meter[form|high|low|max|min|optimum|value],'
		. 'cite,abbr,,b,article,aside,code,col,colgroup,details[open],dfn,figure,figcaption,'
		. 'footer,header,kbd,mark,,nav,pre,q[cite],small,summary,time[datetime],var,ol[start|type]',
	'browser_spellcheck' => true,
	'theme_advanced_blockformats' => 'p,pre,address,h2,h3,h4,h5,h6'
));

$standardsEditor->enablePlugins('media', 'fullscreen', 'inlinepopups');
$standardsEditor->enablePlugins('template');
$standardsEditor->enablePlugins('lists');
$standardsEditor->enablePlugins('visualchars');
$standardsEditor->enablePlugins('xhtmlxtras');
$standardsEditor->enablePlugins(array(
	'ssbuttons' => sprintf('../../../%s/tinymce_ssbuttons/editor_plugin_src.js', THIRDPARTY_DIR),
	'ssmacron' => sprintf('../../../%s/tinymce_ssmacron/editor_plugin_src.js', THIRDPARTY_DIR)
));

// First line:
$standardsEditor->insertButtonsAfter('strikethrough', 'sub', 'sup');
$standardsEditor->removeButtons('underline', 'strikethrough', 'spellchecker');

// Second line:
$standardsEditor->insertButtonsBefore('formatselect', 'styleselect');
$standardsEditor->addButtonsToLine(2,
	'ssmedia', 'sslink', 'unlink', 'anchor', 'separator','code', 'fullscreen', 'separator',
	'template', 'separator', 'ssmacron'
);
$standardsEditor->insertButtonsAfter('pasteword', 'removeformat');
$standardsEditor->insertButtonsAfter('selectall', 'visualchars');
$standardsEditor->removeButtons('visualaid');

// Third line:
$standardsEditor->removeButtons('tablecontrols');
$standardsEditor->addButtonsToLine(3, 'cite', 'abbr', 'ins', 'del', 'separator', 'tablecontrols');
