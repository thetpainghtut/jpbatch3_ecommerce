{{-- <div>
    People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius
</div> --}}

<div class="accordion my-4" id="accordionExample">
  @php $i=1; @endphp
  @foreach($categories as $category)
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapseOne">
          {{$category->name}}
        </button>
      </h2>
    </div>

    <div id="collapse{{$i}}" class="collapse @if($i==1) {{'show'}} @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @foreach($category->subcategories as $subcategory)
        <a href="{{route('filter',$subcategory->id)}}">-{{$subcategory->name}} </a>
        @endforeach
      </div>
    </div>
  </div>
  @php $i++; @endphp
  @endforeach
</div>