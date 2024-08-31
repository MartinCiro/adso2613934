<menu>
    <div class="imgUpload">
        <img src="img/{{ $user->photo }}" class="upload" alt="upload photo">
    </div>

    <div>{{ $user->fullname }}</div>

    <a href="/editUser" class="btncustomer">{{ $user->role }}</a>

    <a href="/profile">
        <img src="images/icon-profile.svg" alt="Login">
        Profile
    </a>
    <img src="images/Line-menu.svg" alt="">

    <a href="/dashboard">
        <img src="images/icon-dashboard.svg" alt="Register">
        Dashboard
    </a>
    <img src="images/Line-menu.svg" alt="">
 
    <a href="javascript:;" onclick="logout.submit();">
        <img src="images/icon-logout.svg" alt="Catalogue">
        LogOut
    </a>
    <form id="logout" action="{{route('logout')}}" method="POST">@csrf</form>
    <img src="images/Line-menu.svg" alt="">
</menu>