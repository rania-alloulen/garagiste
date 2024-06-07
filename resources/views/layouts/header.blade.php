<nav class="main-header navbar navbar-expand navbar-light fixed-top" style="background-color: #615EFC; border-bottom: 1px solid #dee2e6;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Language Selector -->
        <div class="m-2">
            <select name="lstLangues" id="lstLangues" class="form-select" style="width: 150px; background-color: #ffffff; border-color: #ced4da;">
                <option @if (app()->getLocale()=="en") selected @endif value="en">@lang('Englais')</option>
                <option @if (app()->getLocale()=="ar") selected @endif value="ar">@lang('Arabic')</option>
                <option @if (app()->getLocale()=="es") selected @endif value="es">@lang('Espagnol')</option>
                <option @if (app()->getLocale()=="fr") selected @endif value="fr">@lang('Francais')</option>
            </select>
        </div>
    </ul>
</nav>
