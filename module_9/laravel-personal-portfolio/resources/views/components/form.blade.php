<!-- Contact Form -->
<div class="container justify-content-center">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Contact Us</h3>
                    
                    <form method="post" action="" name="cform" id="cform">
                        @csrf
                        <div class="form-group">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Your name...">
                        </div>
                        <div class="form-group">
                            <input name="email" id="email" type="email" class="form-control"
                                placeholder="Email Address...">
                        </div>
                        <div class="form-group">
                            <textarea name="details" id="details" class="form-control" rows="5"
                                placeholder="Project Details..."></textarea>
                        </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Send
                            Message</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>