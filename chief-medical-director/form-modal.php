<div class="modal-body">
    <form class="form-horizontal" action="process-compose-memo.php" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-lg-4  control-label">Memo Reciever</label>
                <div class="col-lg-12">
                    <select class="form-control" name="reciever" required>
                        <option value="<?php echo 0 ?>"><?php echo "All The Staff" ?>      
                        </option>
                    </select>
                    <span style="color: red">** This Field is Required **</span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4  control-label">Memo Subject</label>
                <div class="col-lg-12">
                    <input type="text" placeholder="" id="" class="form-control" placeholder="Please Enter The Memo Subject Here" name="subject" required>
                </div>
                <span style="color: red">** This Field is Required **</span>
            </div>
            <div class="form-group">
                <label class="col-lg-4  control-label">Memo Content</label>
                <div class="col-lg-12">
                    <textarea rows="10" cols="30" class="form-control" id="texarea1" placeholder="Please Enter The Memo Content Here" name="content" required></textarea>
                </div>
                <span style="color: red">** This Field is Required **</span>
            </div>
            <input type="hidden" name="category_name" value="<?php echo "All The Staff" ?>">
            <input type="hidden" name="category_id" value="<?php echo 0 ?>"> 

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-12">
                    <span class="btn green fileinput-button"><i class="fa fa-paperclip fa fa-white"></i>
        			<span>Attachment</span>
                        <input type="file" name="file">
                    </span>
                    <button class="btn btn-primary" type="submit" name="send-memo">Send The Memo</button>
                </div>
            </div>
        </form>
    </div>
</div>