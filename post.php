<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Codester | POST FORUM</title>
    <!--enable ckeditor-->
    <script src="../ckeditor/ckeditor.js"></script>
    </head>

    <body>

<?php  
@session_start();
include("header.php");
include("spinner.php"); 
?>
<div class="bg-content">
    <!--  content  -->
    <div id="content"><div class="ic"></div>
        <div class="container">
            <div class="row">
                <article class="span8">
                    <div class="inner-1">
                        <form id="postforum" action="post.class.php" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                            <ul class="list-blog">
                                <li>

                                    <img alt="" src="img/blog-3.jpg">
                                    <div class="clearfix">
                                        <h3>标题</h3>
                                        <input type="text" name="title" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" style="width: 100%;" ></div>
                                    <div class="clear"></div>
                                    <div style="float: right;position: relative;top:18px;">
                                    </div>
                                    <div class="small">
                                        <select name="types" class="input w50" >
                                            <option value="0" checked>感情帖</option>
                                            <option value="1">交易帖</option>
                                            <option value="2">杂帖</option>
                                        </select>
                                       
                                        <input type="file" hidden="true" id="file_upload" name="addon" />
                                        <button type="button"  id="file_button"
                                                class="btn btn-primary btn-lg" onclick="document.getElementById('file_upload').click();" >&nbsp;上&nbsp;传&nbsp; </button>
                                    </div>
                                    <h3>内容</h3>
                                    <textarea type="text"  id="editor1" name="editor1" rows="20" style="width: 100%;"  >
                                    </textarea>
                                    <script>
                                        // Replace the <textarea name="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'editor1' );
                                    </script>
                                    <button type="submit"  id="submit_btn"
                                            class="btn btn-primary btn-lg" style="float: right;">&nbsp;发&nbsp;帖&nbsp; </button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </article>
                <?php
                 include("right_nav.php");
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php"); 
?>
</body>
</html>
