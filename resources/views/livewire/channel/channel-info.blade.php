<div class="my-4">
    <div class="d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center">
            <img src="{{ asset('/images/' . $channel->image) }}" class="rounded-circle">
            <div class="ml-2">
                <h4>{{$channel->name}}</h4>
                <p class="gray-text text-sm">{{$channel->subscribers()}} subscribers</p>
            </div>
        </div>

        <div>
            <button class="btn btn-lg support-btn" data-toggle="modal" data-target="#exampleModalCenter">
            <span style="color:yellow;">&#36;</span> Support Me
            </button>
            <button wire:click.prevent="toggle" class="btn btn-lg text-uppercase {{$userSubscribed ? 'sub-btn-active' : 'sub-btn'}}">
            {{$userSubscribed ? 'Subscribed' : 'Subscribe'}}
            </button>
        </div>


</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Support me</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center">{{$channel->name}}</h3>
        <p class="text-center"> <img src="{{ asset('/images/' . $channel->image) }}" class="rounded-circle"></p>
        <p><button class="supportButtonsModal support-btn">Buy this video</button></p>
        <p><button class="supportButtonsModal support-btn">Donate</button></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
