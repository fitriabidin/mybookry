<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
    <title>MybookRy</title>
</head>
<style>
    html {
        scroll-behavior: smooth;
    }

    .drop-down02{
	position:relative;
}
.drop-down02 .sub-menu02
{
	position: absolute !important;
	left: 100%;
	top: 0;
}

.drop-down02 .dropdown-toggle{
	padding:.25rem 1.1rem !important;
}

</style>

<body>

    <!-- navbar -->
    <x-navbar/>

    {{-- main area --}}
        {{ $slot }}

    <!-- Footer Section -->
    <x-footer/>

    <div class="fixed-bottom">
         <!-- display success message -->
 @if(session('success'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{ session('success') }}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-615d4c8b0648f824"></script>

    {{-- custom drop down javascript --}}
    <script>
        (function($bs) {
                const CLASS_NAME = 'has-child-dropdown-show';
                    $bs.Dropdown.prototype.toggle = function(_orginal) {
                        return function() {
                            document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
                                e.classList.remove(CLASS_NAME);
                            });
                            let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
                            for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                                dd.classList.add(CLASS_NAME);
                            }
                            return _orginal.call(this);
                        }
                    }($bs.Dropdown.prototype.toggle);

                    document.querySelectorAll('.dropdown').forEach(function(dd) {
                        dd.addEventListener('hide.bs.dropdown', function(e) {
                            if (this.classList.contains(CLASS_NAME)) {
                                this.classList.remove(CLASS_NAME);
                                e.preventDefault();
                            }
                            if(e.clickEvent && e.clickEvent.composedPath().some(el=>el.classList && el.classList.contains('dropdown-toggle'))){
                                e.preventDefault();
                            }
                            e.stopPropagation(); // do not need pop in multi level mode
                        });
                    });

                    // for hover
                    function getDropdown(element) {
                        return $bs.Dropdown.getInstance(element) || new $bs.Dropdown(element);
                    }

                    document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
                        dd.addEventListener('mouseenter', function(e) {
                            let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                            if (!toggle.classList.contains('show')) {
                                getDropdown(toggle).toggle();
                            }
                        });
                        dd.addEventListener('mouseleave', function(e) {
                            let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                            if (toggle.classList.contains('show')) {
                                getDropdown(toggle).toggle();
                            }
                        });
                    });
                })(bootstrap);

          </script>
</body>
</html>
