<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@if(auth()->user()->id !==1)
<div style="text-align: right;">
    <button href="#" style="margin-right: 108px;margin-top:-10px;" data-toggle="modal" data-target="#RequestPoint" class="ui small basic blue icon submit nowrap button">Request Points</button>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="RequestPoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Request Points</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addform">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group">
                        <p style="text-align: center;"><b>Request Points from site admin</b></p><br />
                        <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="name" class="form-control" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="email" class="form-control" value="{{ auth()->user()->email }}">
                        <input type="hidden" name="status" class="form-control" value="Inactive">

                        <input type="number" name="fund_request" style="width:200px;margin-left:140px" class="form-control" aria-describedby="emailHelp" placeholder="Enter Points" required><br />
                    </div>
                    <p style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </p>
                </div>
                <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script text="text/javascript">
    $(document).ready(function() {
        $('#addform').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "userpointadd",
                data: $('#addform').serialize(),
                success: function(response) {
                    console.log(response)
                    $("#RequestPoint").modal('hide')
                    alert("Request Sent");
                    location.reload();

                },
                error: function(error) {
                    console.log(error)
                    alert("Request Not sent");
                }
            });
        });
    })
</script>