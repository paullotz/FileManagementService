@extends('layouts.app')

@section('content')
    <div id="heroImage" class="jumbotron text-center">
        <h1 class="display-4">PSABS File Management Service</h1>
        <p class="lead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
            sem viverra aliquet eget sit amet. Vitae et leo duis ut diam
            quam nulla porttitor.
        </p>
        <hr class="my-4"/>
        <p>You don't have an account yet?</p>
        <a
            id="btnRegister"
            class="btn btn-secondary btn-lg"
            href="{{ route("register") }}"
            role="button"
        >Register here</a
        >
    </div>

    <div class="container">

        <video id="animation" width="640" height="480" style="margin-left:240px;" autoplay loop>
            <source src="animation.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <script>
            let x = document.getElementById("animation");
            $( document ).ready(function() {
                x.volume = 0.2;
            });
            let options = {
                root: null,
                rootMargin:'0px',
                threshold:1.0
            };
            let callback = (entries, )=>{
                entries.forEach(entry=>{
                    if(entry.target.id == 'animation'){
                        if(entry.isIntersecting){
                            entry.target.play();
                        }
                        else{
                            entry.target.pause();
                        }
                    }
                })
            }
            let observer = new IntersectionObserver(callback,options);
            observer.observe(document.querySelector('#animation'));
        </script>
        <h2 id = "darkText" class="text-center">Why us?</h2>

        <p id="pWhyUs" class="lead">
            PSABS – Filemanagment Service is more than just a secure way to organize and deposit files.
            It is the product of five creative and hardworking heads summarizing their ideas and dreams together,
            to shape the future of web development and data security.In comparison to other File management Services,
            PSABS offers discrete handling
            of your data and professional interactions with our customers.
            With your registration, we can grow our business and become real competitors to tremendous companies,
            like Amazon or Google, as well as, effort and develop better technologies, to ensure the best customers
            experience possible.
        </p>
        <br>
        <p id="pWhyUs" class="lead">
            Therefore we rely on your feedback and hope our clients enjoy their stay on our website.
            urna. Facilisi morbi tempus iaculis urna. Nulla aliquet enim
            tortor at auctor urna nunc. Libero enim sed faucibus turpis in.
            Massa massa ultricies mi quis hendrerit dolor. Amet nisl
            suscipit adipiscing bibendum est ultricies integer quis. Felis
            eget nunc lobortis mattis aliquam. Semper quis lectus nulla at
            volutpat diam. Mauris rhoncus aenean vel elit scelerisque mauris
            pellentesque pulvinar pellentesque. Id semper risus in hendrerit
            gravida. Vivamus at augue eget arcu dictum varius duis at
            consectetur. Leo a diam sollicitudin tempor id eu nisl nunc.ctum sit amet justo donec enim diam vulputate. Laoreet
            suspendisse interdum consectetur libero id. Dictumst quisque
            sagittis purus sit amet volutpat consequat. Volutpat maecenas
            volutpat blandit aliquam etiam. Nec feugiat in fermentum posuere
            urna. Facilisi morbi tempus iaculis urna. Nulla aliquet enim
            tortor at auctor urna nunc. Libero enim sed faucibus turpis in.
            Massa massa ultricies mi quis hendrerit dolor. Amet nisl
            suscipit adipiscing bibendum est ultricies integer quis. Felis
            eget nunc lobortis mattis aliquam. Semper quis lectus nulla at
            volutpat diam. Mauris rhoncus aenean vel elit scelerisque mauris
            pellentesque pulvinar pellentesque. Id semper risus in hendrerit
            gravida. Vivamus at augue eget arcu dictum varius duis at
            consectetur. Leo a diam sollicitudin tempor id eu nisl nunc.
            Nisi lacus sed viverra tellus in hac habitasse platea dictumst.
            Feugiat pretium nibh ipsum consequat nisl vel pretium lectus
            quam. Feugiat scelerisque varius morbi enim nunc faucibus a.
            Imperdiet dui accumsan sit amet nulla facilisi. Sollicitudin
            nibh sit amet commodo nulla facilisi nullam vehicula. Nibh
            tortor id aliquet lectus proin nibh nisl condimentum. Vitae
            auctor eu augue ut. Donec enim diam vulputate ut pharetra.
            Congue nisi vitae suscipit tellus mauris. Auctor urna nunc id
            cursus metus aliquam eleifend mi. Id nibh tortor id aliquet
        </p>
    </div>
@endsection
