 <x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
     <x-filament::input.wrapper>
         <div x-data="{ state: $wire.$entangle(@js($getStatePath())) }" {{ $getExtraAttributeBag() }}>
         <div id="map" style="height: 30px;">amp</div>
         {{-- <p id="location-display" class="text-sm text-gray-600 mt-2"></p> --}}

         <input type="visible" wire:model="{{ $getStatePath() }}.latitude">where
         <input type="visible" wire:model="{{ $getStatePath() }}.longitude">ta

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

         <script>
             document.addEventListener('DOMContentLoaded', () => {
                 if (!window.locationPickerInitialized) {
                     window.locationPickerInitialized = true;

                     if (navigator.geolocation) {
                         navigator.geolocation.getCurrentPosition((position) => {
                             const lat = position.coords.latitude;
                             const lon = position.coords.longitude;

                             document.querySelector('[name="{{ $getStatePath() }}[latitude]"]').value = lat;
                             document.querySelector('[name="{{ $getStatePath() }}[longitude]"]').value = lon;

                             document.getElementById('location-display').textContent =
                                 `Latitude: ${lat}, Longitude: ${lon}`;

                             const map = L.map('map').setView([lat, lon], 15);
                             L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                 attribution: '&copy; OpenStreetMap contributors'
                             }).addTo(map);

                             L.marker([lat, lon]).addTo(map)
                                 .bindPopup('Your location')
                                 .openPopup();
                         }, (error) => {
                             console.error('Geolocation error:', error);
                         });
                     } else {
                         console.error('Geolocation not supported.');
                     }
                 }
             });
         </script>
     </div>
     </x-filament::input.wrapper>
 </x-dynamic-component>
