        <footer class="row">
            <p class="col-xs-12 col-sm-6 col-md-8">&copy; {{ date('Y') }} {{ $CopyrightOwner or 'Demo' }}</p>
            <ul id="footer-nav" class="col-xs-6 col-md-4 hidden-xs">
                <li><a href="{{ route('about') }}">关于</a></li>
                <li><a href="{{ route('contact') }}">联系</a></li>
                <li><a href="{{ route('help') }}">帮助</a></li>
            </ul>
        </footer>