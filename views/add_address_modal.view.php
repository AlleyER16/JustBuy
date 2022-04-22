<div class="modal fade" id="add_address_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-center">Add address</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="add_address_form">
      <!-- Modal body -->
      <div class="modal-body">
          <div class="row">
              <div class="col-12">
                  <div class="form-group">
                      <label>Address Type</label>
                      <input type="text" name="address_type" class="form-control" placeholder="Enter address type"/>
                  </div>
                  <div class="form-group">
                      <label>Address</label>
                      <textarea name="address" class="form-control" placeholder="Enter address type"></textarea>
                  </div>
                  <div class="form-group">
                      <label>City</label>
                      <input type="text" name="city" class="form-control" placeholder="Enter city"/>
                  </div>
                  <div class="form-group">
                      <label>State</label>
                      <input type="text" name="state" class="form-control" placeholder="Enter state"/>
                  </div>
                  <div class="form-group">
                      <label>Zip Code</label>
                      <input type="text" name="zip_code" class="form-control" placeholder="Enter zip code"/>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal-footer text-right">

          <span class="server_response"></span>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <button type="submit" class="btn btn-success">Add address</button>

      </div>
    </form>
    </div>
  </div>
</div>
