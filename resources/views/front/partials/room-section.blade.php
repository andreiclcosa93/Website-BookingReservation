<section class="hp-room-section my-5">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                @forelse($rooms  as $room)
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('/front/img/room/room-b1.jpg') }}">
                        <div class="hr-text">
                            <h3>{{ $room->name }}</h3>
                            <h2>{{ $room->price }}<span>/Noapte</span></h2>
                            <table>
                                <tbody>
                                    @forelse($room->publicFacilities() as $facility)
                                    <tr>
                                        <td class="r-o">{{ $facility->name }}:</td>
                                        <td>{{ $facility->description }}</td>
                                    </tr>
                                    @empty

                                    @endforelse


                                </tbody>
                            </table>
                            <a href="{{ route('rooms.detail',$room->id) }}" class="primary-btn">Detaliere</a>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse

            </div>
        </div>
    </div>
</section>
