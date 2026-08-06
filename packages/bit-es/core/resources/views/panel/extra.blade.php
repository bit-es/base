<div id="slogan">
    <h3>Commitment and Quality Beyond Customer Expectations</h3>
    <div id="tip1">
        tip1
    </div>

</div>
<style>
    body {
        background: url('{{ asset('images/atm.jpg') }}') no-repeat center center fixed;
    }

    @media screen and (min-width: 1024px) {
        main {
            position: absolute;
            right: 100px;
            padding: 1px;
        }

        main:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: darkcyan;
            border-radius: 12px;
            z-index: -9;

            /*box-shadow: -50px 80px 4px 10px #555;*/
            -webkit-transform: rotate(7deg);
            -moz-transform: rotate(7deg);
            -o-transform: rotate(7deg);
            -ms-transform: rotate(7deg);
            transform: rotate(7deg);
        }




        #slogan {
            position: fixed;
            left: 100px;
            top: 50px;
            color: bisque;
            font-family: Arial, sans-serif;
            font-size: 2em;
            font-weight: bold;
            text-shadow: #3f6212 2px 2px 5px;
            max-width: 100px;
            /* or any width that fits your layout */
            white-space: normal;
            word-wrap: break-word;
        }

    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const headers = document.querySelectorAll('.fi-simple-header');
        headers.forEach(header => {
            header.style.cursor = 'pointer';
            header.addEventListener('click', function() {
                window.location.href = "{{ route('filament.staff.pages.dashboard') }}";
            });
        });
    });
</script>
