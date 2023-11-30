<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">NOTIFIKASI</span>
    @endpush
        <div class="my-3 p-3 bg-white rounded box-shadow mx-5">
            <div  id="card" class="bm-border1 media text-muted d-flex flex-row justify-content-between p-3 m-3">
                <div class="bm-border3 bm-font-54 bi-bell-fill px-3 me-5 rounded"></div>
                <div class="bm-font-16 media-body pb-3 mb-0 small lh-125 me-auto">
                    <div class="d-flex flex-column justify-content-between align-items-start w-100">
                        <strong class="bm-font-medium">
                            Prediksi ayam mati lebih dari <span>10</span>
                            Segera lakukan tindakan
                        </strong>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mt-auto">
                    <span class="bm-font-16 d-block me-5">dd/mm/yyyy</span>
                    <button class="bi-trash btn btn-lg btn-block" type="submit"></button>
                </div>
            </div>
            <!-- <div id="card" class="bm-border1 media text-muted d-flex flex-row justify-content-between p-3 m-3">
                <div class="bm-border3 bm-font-54 bi-bell-fill px-3 me-5 rounded"></div>
                <div class="bm-font-16 media-body pb-3 mb-0 small lh-125 me-auto">
                    <div class="d-flex flex-column justify-content-between align-items-start w-100">
                        <strong class="bm-font-medium">Prediksi ayam mati lebih dari 10
                            Segera lakukan tindakan</strong>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mt-auto">
                    <span class="bm-font-16 d-block me-5">dd/mm/yyyy</span>
                    <button class="bi-trash btn btn-lg btn-block" type="submit"></button>
                </div>
            </div> -->
        </div>
        @push('scripts')
        <script>
            document.getElementById('card').addEventListener('click', function() {
                window.location.href = "{{ url('/notifikasi/detail') }}";
            });
        </script>
        @endpush
</x-app-layout>