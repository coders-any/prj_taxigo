/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    CKEDITOR.editorConfig = function( config )
    {
        config.skin="v2";  // có thể đổi thành 1 trong 3 giá trị sau: v2, kama, office2003
        config.enterMode = CKEDITOR.ENTER_BR;
        config.filebrowserBrowseUrl = "http://prj_taxigo.loc:8080/ckfinder/ckfinder.html";
        config.filebrowserImageBrowseUrl = "http://prj_taxigo.loc:8080/ckfinder/ckfinder.html?type=Images";
        config.filebrowserFlashBrowseUrl = "http://prj_taxigo.loc:8080/ckfinder/ckfinder.html?type=Flash";
        config.filebrowserUploadUrl = "http://prj_taxigo.loc:8080/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
        config.filebrowserImageUploadUrl = "http://prj_taxigo.loc:8080/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
        config.filebrowserFlashUploadUrl = "http://prj_taxigo.loc:8080/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";
    }
};
