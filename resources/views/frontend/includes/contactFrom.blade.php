
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<section class="homeContact">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">07 - Say hello</span>
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <h2 class="mail"><a href="almamoon602@gmail.com">almamoon602@gmail.com</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <script>
                                @if(count($errors) > 0)
                                    @foreach($errors->all() as $error)
                                        toastr.error("{{ $error }}");
                                    @endforeach
                                @endif
                            </script>
                                <div class="homeContact__form">
                                    <form action="{{route('contact.insert')}}" method="Post">
                                        @csrf
                                        <input name="contact_name" value="{{old('contact_name')}}" type="text" placeholder="Enter name*">
                                        <input name="contact_email" value="{{old('contact_email')}}" type="email" placeholder="Enter mail*">
                                        <input name="contact_number" value="{{old('contact_number')}}" type="number" placeholder="Enter number*">
                                        <textarea name="contact_message" placeholder="Enter Massage*"> {{old('contact_message')}}</textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>