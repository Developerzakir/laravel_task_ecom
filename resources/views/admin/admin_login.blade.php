

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Admin Login Form</h2>
            <div class="form-body">
                <form class="row g-3" method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    
                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" type="email" name="email" :value="old('email')"  placeholder="Email Address">
                    </div>
                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" 
                            name="password" class="form-control border-end-0" id="password"   placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                        </div>
                    </div>
                
                    
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
