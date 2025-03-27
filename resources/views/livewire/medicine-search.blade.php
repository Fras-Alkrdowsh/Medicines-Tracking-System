<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="input-group mb-4">
          <input type="text" class="form-control" wire:model="input" placeholder=" ادخل اسم الدواء .....">
          <span class="input-group-append">
            <button class="btn ripple btn-primary" wire:click="get_parmacies()" type="button">بحث</button>
          </span>
        </div>
        <div class="main-content-label mg-b-5">
          مواقع الصيدليات 
        </div>
        <p class="mg-b-20">ستظهر الصيدليات التي يتوفر لديها الدواء الذي تبحث عنه هنا .</p>
        <div wire:ignore class="ht-450" id="map"></div>
      </div>
    </div>

 
  </div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Livewire.on('confirm', (event) => {
        var pharmacies = event.pharmacy;
        pharmacies.forEach(function(pharmacy) {
            console.log(pharmacy.name);

            L.marker([pharmacy.latitude, pharmacy.longitude])
                .addTo(map)
                .bindPopup('<h5>عنوان الصيدلية: ' + pharmacy.address + '<br></h5>' +
                '<h5>اسم الصيدلية: ' + pharmacy.name+'<br></h5>'
            );
        });
    });
});
</script>
