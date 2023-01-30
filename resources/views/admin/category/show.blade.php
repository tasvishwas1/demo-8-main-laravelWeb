<div class="mb-3">
    <label class="col-form-label" for="recipient-name">Category:</label>
    <input class="form-control" id="recipient-name" type="text" value="{{ $category->name }}">
</div>
<div class="mb-3">
    <label class="col-form-label" for="message-text">Description:</label>
    <textarea class="form-control">{{ $category->description }}</textarea>
</div>
<div class="mb-3">
    <label class="col-form-label" for="message-text">Image:</label>
    <div class="card-body">
        <div class="row gallery my-gallery" id="aniimated-thumbnials" itemscope="">
            <figure class="col-md-12 col-12 img-hover hover-1" itemprop="associatedMedia" itemscope=""><a
                    href="{{ url($category->image) }}" itemprop="contentUrl" data-size="1600x950">
                    <div>
                        <img src="{{ url($category->image) }}" itemprop="thumbnail" alt="Image description" width="100%"
                             height="100%">
                    </div>
                </a>
            </figure>
        </div>
    </div>
</div>
