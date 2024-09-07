@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="margin: 0; padding: 0;">
            <img src="{{asset('image/Board Game Cafe.jpg')}}" alt="" style="width: 100%; height: 500px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 15px; background-color: black ; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center;">
            <img src="{{asset('image/Board Game Logo.png')}}" alt="" style="max-width: 100%; max-height: 210px; margin: 0; padding: 0;">
            <h2>STL</h2><h2>Board Game Cafe</h2>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <a href="{{route('showProduct')}}" class="col-md-4" style="padding: 0;">
            <img src="{{asset('image/Board Game Library.jpg')}}" alt="" style="width: 100%; height: 300px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 10px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: red; text-align: center;">
            <h4>Want to play board game? Let's see our Board Game Library!</h4>
            </div>
        </a>
        <a href="{{route('showTable')}}" class="col-md-4" style="padding: 0;">
            <img src="{{asset('image/Board Game Table.jpeg')}}" alt="" style="width: 100%; height: 300px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 10px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: red; text-align: center;">
            <h4>Want to book? Let's book now!</h4>
            </div>
        </a>
        <a href="{{route('menu')}}" class="col-md-4" style="padding: 0;">
            <img src="{{asset('image/Board Game Menu.jpeg')}}" alt="" style="width: 100%; height: 300px; margin: 0; padding: 0;">
            <div class="card" style="border: 2px solid; border-radius: 20px; padding: 10px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: red; text-align: center;">
            <h4>Want enjoy food? Let's see our menu!</h4>
            </div>
        </a>
    </div>
    <div class="row mt-4">
        <div class="col-md-8">
        <h4><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 56 56">
                <path fill="currentColor" d="M39.156 50.934c4.078 0 6.774-1.102 9.164-3.774c.188-.187.352-.398.54-.586c1.406-1.57 2.062-3.117 2.062-4.593c0-1.688-.984-3.258-3.07-4.712l-6.82-4.734c-2.11-1.453-4.571-1.617-6.54.328l-1.804 1.805c-.54.539-1.008.563-1.547.234c-1.242-.797-3.797-3.023-5.532-4.757c-1.828-1.805-3.609-3.82-4.523-5.297c-.328-.54-.281-.985.258-1.524l1.781-1.805c1.969-1.968 1.805-4.453.352-6.538l-4.758-6.82c-1.43-2.087-3-3.048-4.688-3.071c-1.476-.024-3.023.656-4.593 2.062c-.211.188-.399.352-.61.516c-2.648 2.39-3.75 5.086-3.75 9.14c0 6.704 4.125 14.86 11.696 22.43c7.523 7.524 15.703 11.696 22.382 11.696m.024-3.61c-5.977.117-13.64-4.476-19.711-10.523c-6.117-6.094-10.922-14.016-10.805-19.992c.047-2.579.938-4.805 2.79-6.399c.14-.14.28-.258.444-.375c.68-.61 1.454-.937 2.11-.937c.703 0 1.312.257 1.758.96l4.547 6.82c.492.727.539 1.548-.188 2.274l-2.062 2.063c-1.641 1.617-1.5 3.586-.328 5.156c1.335 1.805 3.656 4.43 5.437 6.211c1.805 1.805 4.64 4.336 6.445 5.695c1.57 1.172 3.563 1.29 5.18-.328l2.062-2.062c.727-.727 1.524-.68 2.25-.211l6.82 4.547c.704.468.985 1.054.985 1.758c0 .68-.328 1.43-.96 2.132a5.82 5.82 0 0 1-.352.446c-1.617 1.828-3.844 2.718-6.422 2.765"/>
            </svg> 07-XXX XXXX
        </h4>
        <h4><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 256 256">
                <g fill="none">
                    <rect width="256" height="256" fill="#F4F2ED" rx="60"/>
                    <path fill="#4285F4" d="M41.636 203.039h31.818v-77.273L28 91.676v97.727c0 7.545 6.114 13.636 13.636 13.636"/>
                    <path fill="#34A853" d="M182.545 203.039h31.819c7.545 0 13.636-6.114 13.636-13.636V91.675l-45.455 34.091"/>
                    <path fill="#FBBC04" d="M182.545 66.675v59.091L228 91.676V73.492c0-16.863-19.25-26.477-32.727-16.363"/>
                    <path fill="#EA4335" d="M73.455 125.766v-59.09L128 107.583l54.545-40.909v59.091L128 166.675"/>
                    <path fill="#C5221F" d="M28 73.493v18.182l45.454 34.091v-59.09L60.727 57.13C47.227 47.016 28 56.63 28 73.493"/>
                </g>
            </svg> XXXXX@gmail.com
        </h4>
        <h4><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 256 256">
                <path fill="#1877F2" d="M256 128C256 57.308 198.692 0 128 0C57.308 0 0 57.307 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.347-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.958 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"/>
                <path fill="#FFF" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A128.959 128.959 0 0 0 128 256a128.9 128.9 0 0 0 20-1.555V165h29.825"/>
            </svg> STL Board Game Cafe
        </h4>
        <h4><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 256 256">
                <g fill="none">
                    <rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60"/>
                    <rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60"/>
                    <path fill="#fff" d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604h.031Zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396c0 26.688-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413c0-26.704.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5c3.5-3.5 6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563v.025Zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12v.004Zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355c0 28.361 22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355h.002Zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334c-18.41 0-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334Z"/>
                    <defs>
                        <radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1" gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FD5"/>
                            <stop offset=".1" stop-color="#FD5"/>
                            <stop offset=".5" stop-color="#FF543E"/>
                            <stop offset="1" stop-color="#C837AB"/>
                        </radialGradient>
                        <radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1" gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3771C8"/>
                            <stop offset=".128" stop-color="#3771C8"/>
                            <stop offset="1" stop-color="#60F" stop-opacity="0"/>
                        </radialGradient>
                    </defs>
                </g>
            </svg> STL Board Game Cafe
        </h4>
        <h4><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 48 48">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M23.523 5.5H7.5a2 2 0 0 0-2 2v33a2 2 0 0 0 2 2h33a2 2 0 0 0 2-2v-33a2 2 0 0 0-2-2h-4.948"/>
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M29.538 3.367a9.554 9.554 0 0 0-9.554 9.554c0 7.478 7.313 16.49 9.207 18.7a.577.577 0 0 0 .881-.005c1.862-2.216 9.02-11.222 9.02-18.694a9.554 9.554 0 0 0-9.554-9.555Zm0 13.125a3.57 3.57 0 1 1 3.57-3.57a3.57 3.57 0 0 1-3.57 3.57Zm5.252 8.566l7.71-1.188m-37 5.702l19.82-3.055m-7.412 1.143L14.168 5.5"/>
            </svg> 12, Jalan XXX 34, Taman XXXXX
        </h4>
        </div>
        <div class="col-md-4">
            <iframe
                width="100%"
                height="300"
                frameborder="0" style="border: 2px dashed #ccc;"
                src=""
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection
