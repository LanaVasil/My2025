<div class="main__container">

  <div class="row">

      <div class="col-6">
        <img src="{{ asset('storage/' .$row->img) ? asset('storage/img/empty.jpg') : asset('storage/' .$row->img) }}" alt="Photo {{ $row->id}}">
                           
                      <h1>{{ $row->name }}</h1>
                      <p>{{ $row->note }}</p>
                      <p>{{ $row->brand_id }}</p>
      </div>
  </div>
</div>
