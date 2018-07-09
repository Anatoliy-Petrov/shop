<image-component :attributes="{{ $image }}" inline-template>

    <div id="image-{{ $image->id }}" class="product col-sm-6 col-md-4 col-lg-3">
        <div class="well">
        	<img src="{{ asset('/img/'.$image->path) }}">
        </div>
        <button type="button" class="btn btn-xs btn-danger mr-1" @click="destroy">удалить</button>
        <hr>
    </div>
 
</image-component>