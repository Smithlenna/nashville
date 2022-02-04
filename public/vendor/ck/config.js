/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#00324c';
    config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] },
        {name: 'filemanager', groups: ['responsivefilemanager ']},
	];
	
	config.extraPlugins = "html5audio,liststyle,list";

    config.filebrowserBrowseUrl = '/vendor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	config.filebrowserUploadUrl = '/vendor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	config.filebrowserImageBrowseUrl = '/vendor/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
	config.removeButtons = 'Save,NewPage,ExportPdf,Preview,Print,Templates,Copy,Cut,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,CopyFormatting,RemoveFormat,Outdent,Indent,BidiLtr,BidiRtl,Language,Flash,PageBreak,ShowBlocks,Maximize,About,Smiley,CreateDiv,Iframe,SpecialChar,Anchor,Button,ImageButton,HiddenField,Strike,JustifyBlock,Font,FontSize,Styles';
};
