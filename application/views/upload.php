<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta charset="utf-8">
<title></title>

<meta name="viewport" content="width=device-width">
<!-- Bootstrap CSS Toolkit styles -->
<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="<?=base_url()?>static/css/style-up.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-responsive.min.css">
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?=base_url()?>static/css/jquery.fileupload-ui.css">
<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div id='inline_content' style='padding:10px; background:#fff;'>

                            <form id="fileupload" action="<? echo site_url('service/up/upload_img'); ?>" method="POST" enctype="multipart/form-data">
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                <div class="row fileupload-buttonbar">
                                    <div class="span7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <span><i class="icon-plus icon-white"></i> Add files...</span>
                                            <input type="file" name="userfile" multiple>
                                        </span>
                                        
                                       
                                    </div>
                                    <div class="span5">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-success progress-striped active fade">
                                            <div class="bar" style="width:0%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- The loading indicator is shown during image processing -->
                                <div class="fileupload-loading"></div>
                                <br>
                                <!-- The table listing the files available for upload/download -->
                                <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
                            </form>



                        <!-- modal-gallery is the modal dialog used for the image gallery -->
                        <div id="modal-gallery" class="modal modal-gallery hide fade">
                            <div class="modal-header">
                                <a class="close" data-dismiss="modal">&times;</a>
                                <h3 class="modal-title"></h3>
                            </div>
                            <div class="modal-body"><div class="modal-image"></div></div>
                            <div class="modal-footer">
                                <a class="btn btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
                                <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
                                <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> Slideshow</a>
                                <a class="btn modal-download" target="_blank"><i class="icon-download"></i> Download</a>
                            </div>
                        </div>




                        <!-- The template to display files available for upload -->
                        <script id="template-upload" type="text/x-tmpl">
                            {% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l; file=files[++i]) { %}
                            <tr class="template-upload fade">
                                <td class="preview"><span class="fade"></span></td>
                                <td class="name">{%=file.name%}</td>
                                <td class="size">{%=o.formatFileSize(file.size)%}</td>
                                {% if (file.error) { %}
                                <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                                {% } else if (o.files.valid && !i) { %}
                                <td>
                                    <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
                                </td>
                                <td class="start">{% if (!o.options.autoUpload) { %}
                                   
                                    {% } %}</td>
                                {% } else { %}
                                <td colspan="2"></td>
                                {% } %}
                               
                            </tr>
                            {% } %}
                            </script>

                            <div id="download-files">
                            <!-- The template to display files available for download -->
                            <script id="template-download" type="text/x-tmpl">
                                {% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l; file=files[++i]) { %}
                                <tr class="template-download fade">
                                    {% if (file.error) { %}
                                    <td class="preview"><span class="fade"></span></td>
                                    <td class="name">{%=file.name%}</td>
                                    <td class="size">{%=o.formatFileSize(file.size)%}</td>
                                    <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                                    {% } else { %}
                                    <td class="preview">{% if (file.thumbnail_url) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img width="100px" src="<?=base_url()?>{%=file.thumbnail_url%}"></a>
                                        {% } %}</td>
                                    
                                    <td class="size">{%=o.formatFileSize(file.size)%}</td>
                                    <td colspan="2"></td>
                                    {% } %}
                                   

                                    
                                </tr>
                                {% } %}

                               
                                </script>
                            </div>
                                        
                                        









<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?=base_url()?>static/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?=base_url()?>static/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?=base_url()?>static/js/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="<?=base_url()?>static/js/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?=base_url()?>static/js/jquery.fileupload-ui.js"></script>
<!-- The localization script -->
<script src="<?=base_url()?>static/js/locale.js"></script>
<!-- The main application script -->
<script src="<?=base_url()?>static/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="<?=base_url()?>static/js/cors/jquery.xdr-transport.js"></script><![endif]-->
</div>
</body> 
</html>