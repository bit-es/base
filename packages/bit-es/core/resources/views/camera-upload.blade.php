<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="cameraUpload({
            statePath: @js($getStatePath()),
            uploadUsing: async (file) => {
                $wire.upload('{{ $getStatePath() }}', file)
            },
        })"
        class="space-y-2"
    >
        <video x-ref="video" autoplay playsinline class="w-full rounded-lg border" style="max-height: 300px;"></video>
        <canvas x-ref="canvas" class="hidden"></canvas>
        <img x-ref="photo" x-show="photoData" :src="photoData" class="w-full rounded-lg border" />

        <div class="flex gap-2 mt-2">
            <button type="button" class="px-3 py-1 bg-gray-200 rounded" @click="startCamera()">📷 Start</button>
            <button type="button" class="px-3 py-1 bg-blue-500 text-white rounded" @click="takePhoto()">Take</button>
            <button type="button" class="px-3 py-1 bg-green-500 text-white rounded" x-show="photoData" @click="uploadPhoto()">Upload</button>
        </div>
    </div>

    <script>
        function cameraUpload({ statePath, uploadUsing }) {
            return {
                stream: null,
                photoData: null,
                async startCamera() {
                    try {
                        this.stream = await navigator.mediaDevices.getUserMedia({ video: true });
                        this.$refs.video.srcObject = this.stream;
                    } catch (e) {
                        alert('Cannot access camera: ' + e.message);
                    }
                },
                takePhoto() {
                    if (!this.stream) return alert('Camera not started');
                    const canvas = this.$refs.canvas;
                    const video = this.$refs.video;
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    this.photoData = canvas.toDataURL('image/png');
                },
                async uploadPhoto() {
                    if (!this.photoData) return;
                    const res = await fetch(this.photoData);
                    const blob = await res.blob();
                    const file = new File([blob], `camera-${Date.now()}.png`, { type: 'image/png' });
                    await uploadUsing(file);
                    this.photoData = null;
                    this.stopCamera();
                },
                stopCamera() {
                    if (this.stream) {
                        this.stream.getTracks().forEach(track => track.stop());
                        this.stream = null;
                    }
                },
            }
        }
    </script>
</x-dynamic-component>
