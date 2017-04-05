<div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Meme</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="/memes" enctype="multipart/form-data">

            {{csrf_field()}}
            <div class="form-group">
              <label for="email">Title:</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="amountHelp" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
              <div class="class-group">
                <label for="meme_img">Image:</label>
                <input type="file" class="form-control" id="meme_img" name="meme_img" required>
              </div>
            </div>
            <div class="class-group" ng-controller="MainCtrl"> 
              <label for="tags">Tags:</label>
              <!-- <input type="text" class="form-control" id="email" name="email"> -->
              <input id="tag1" name="tag1" value="" class="form-control" placeholder="Enter Tags" style="width:100px;" />
            </div>
            <input type="hidden" name="isAddExp" value="1">
            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" id="expense_id" name="expense_id">
            <button type="submit" class="btn btn-primary" id="submitExpense">Submit</button>
          </form>
        </div>
       
      </div>
      
    </div>
</div>
