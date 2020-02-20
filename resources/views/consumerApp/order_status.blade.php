@extends('consumerApp.main')

@section('title', 'Mensakas')

@push('styles')

@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
@endpush

@section('extendedSection')
<div class="section"></div>
<div class="section"></div>
<div class="section"></div>
<center>
    <div class="section"></div>
    <div class="section"></div>
    <div class="container">
        <div class="z-depth-1 white lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 500px;">                
			<div class='row'>
				@if ($status == 1)
					<img style="width: 50px" src="https://pngimage.net/wp-content/uploads/2018/06/icone-document-png.png">
					<h5>Hemos recibido tu pedido<br>En breves momentos, procederemos a prepararlo</h5>
				@elseif ($status == 3)
					<img style="width: 50px" src="https://i.pinimg.com/originals/98/82/ec/9882ec514a7646b304d06f8f42a15a0c.png">
					<h5>Tu pedido se está preparando</h5>
				@elseif ($status == 4)
					<img style="width: 50px" src="https://peruvianharvest.com/nuevo/delivery.svg">
					<h5>Tu pedido está de camino</h5>
				@endif
        	</div>
    	</div>
    </div>
</center>
<div class="section"></div>
<div class="section"></div>
@endsection