<link rel="stylesheet" href="<?=base_url(); ?>../resources/upload/css/style.css">

<link rel="stylesheet" href="<?=base_url(); ?>../resources/upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?=base_url(); ?>../resources/upload/css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="<?=base_url(); ?>../resources/upload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?=base_url(); ?>../resources/upload/css/jquery.fileupload-ui-noscript.css"></noscript>



<div id="fileupload">
       <!-- Upload function on action form -->
	<form action="upload/do_upload" method="POST" enctype="multipart/form-data">
	<div class="panel panel-default">

<div class=" panel-heading">Gallery  <a href="<?=site_url()?>gallery" class="btn btn-warning btn-xs pull-right"><i class="glyphicon glyphicon-arrow-left"></i> <span>Back to list</span></a>
<div class="clearfix"></div>
</div>
	<div class="panel-body">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="userfile" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
                
                <!-- The loading indicator is shown during file processing -->
                <span class="fileupload-loading"></span>
            </div>
            <!-- The global progress information -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
                 
            </div>
           
        </div>
       
        </div>
		</div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
</div>

            <!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even" style="display:none;">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            {% } %}
        </td>
        <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

<script src="<?=base_url()?>../resources/upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?=base_url()?>../resources/upload/js/tmpl.min.js"></script>
<script src="<?=base_url()?>../resources/upload/js/load-image.min.js"></script>
<script src="<?=base_url()?>../resources/upload/js/canvas-to-blob.min.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.iframe-transport.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.fileupload.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.fileupload-process.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.fileupload-image.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.fileupload-audio.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.fileupload-video.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.fileupload-validate.js"></script>
<script src="<?=base_url()?>../resources/upload/js/jquery.fileupload-ui.js"></script>
<script src="<?=base_url()?>../resources/upload/js/main.js"></script>

<!--[if (gte IE 8)&(lt IE 10)]>
<script src="<?=base_url()?>../resources/upload/js/cor/jquery.xdr-transport.js"></script>
<![endif]-->