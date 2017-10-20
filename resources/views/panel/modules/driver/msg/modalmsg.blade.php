<style>
.modal {
  text-align: center;
}

@media screen and (min-width: 768px) {
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
.modal-header {
  background-color: #00080f !important;
  color: white !important;
}
</style>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header panel-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Conductores</h4>
        </div>

      <form id="frm_msg" action="index.html" method="post" >
        <div class="modal-body">

              <div class="form-group">
                  <label for="comment"><h4>Mensaje:</h4></label>

                  <textarea class="form-control" style="border-color: #000000;" rows="5" id="msg" required></textarea>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="send">Enviar</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
