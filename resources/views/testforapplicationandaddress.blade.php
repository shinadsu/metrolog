<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <style>
:root {
  --bg: #ebf0f7;
  --header: #fbf4f6;
  --text: #2e2e2f;
  --white: #ffffff;
  --light-grey: #c4cad3;
  --tag-1: #ceecfd;
  --tag-1-text: #2e87ba;
  --tag-2: #d6ede2;
  --tag-2-text: #13854e;
  --tag-3: #ceecfd;
  --tag-3-text: #2d86ba;
  --tag-4: #f2dcf5;
  --tag-4-text: #a734ba;
  --purple: #7784ee;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  color: var(--text);
}

.app {
 
  width: 100%;
  min-height: 100vh;
}

h1 {
  font-size: 30px;
}

.project {
  padding: 2rem;
  max-width: 75%;
  width: 100%;
  display: inline-block;
}
.project-info {
  padding: 2rem 0;
  display: flex;
  width: 100%;
  justify-content: space-between;
  align-items: center;
}
.project-participants {
  display: flex;
  align-items: center;
}
.project-participants span, .project-participants__add {
  width: 30px;
  height: 30px;
  display: inline-block;
  background: var(--purple);
  border-radius: 100rem;
  margin: 0 0.2rem;
}
.project-participants__add {
  background: transparent;
  border: 1px dashed #969696;
  font-size: 0;
  cursor: pointer;
  position: relative;
}
.project-participants__add:after {
  content: "+";
  font-size: 15px;
  color: #969696;
}
.project-tasks {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  width: 100%;
  grid-column-gap: 1.5rem;
}
.project-column-heading {
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.project-column-heading__title {
  font-size: 20px;
}
.project-column-heading__options {
  background: transparent;
  color: var(--light-grey);
  font-size: 18px;
  border: 0;
  cursor: pointer;
}

.task {
  cursor: move;
  background-color: var(--white);
  padding: 1rem;
  border-radius: 8px;
  width: 100%;
  box-shadow: rgba(99, 99, 99, 0.1) 0px 2px 8px 0px;
  margin-bottom: 1rem;
  border: 3px dashed transparent;
}
.task:hover {
  box-shadow: rgba(99, 99, 99, 0.3) 0px 2px 8px 0px;
  border-color: rgba(162, 179, 207, 0.2) !important;
}
.task p {
  font-size: 15px;
  margin: 1.2rem 0;
}
.task__tag {
  border-radius: 100px;
  padding: 2px 13px;
  font-size: 12px;
}
.task__tag--copyright {
  color: var(--tag-4-text);
  background-color: var(--tag-4);
}
.task__tag--design {
  color: var(--tag-3-text);
  background-color: var(--tag-3);
}
.task__tag--illustration {
  color: var(--tag-2-text);
  background-color: var(--tag-2);
}
.task__tags {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.task__options {
  background: transparent;
  border: 0;
  color: var(--light-grey);
  font-size: 17px;
}
.task__stats {
  position: relative;
  width: 100%;
  color: var(--light-grey);
  font-size: 12px;
}
.task__stats span:not(:last-of-type) {
  margin-right: 1rem;
}
.task__stats svg {
  margin-right: 5px;
}


.task-hover {
  border: 3px dashed var(--light-grey) !important;
}

.task-details {
  width: 24%;
  border-left: 1px solid #d9e0e9;
  display: inline-block;
  height: 100%;
  vertical-align: top;
  padding: 3rem 2rem;
}

.tag-progress {
  margin: 1.5rem 0;
}
.tag-progress h2 {
  font-size: 16px;
  margin-bottom: 1rem;
}
.tag-progress p {
  display: flex;
  width: 100%;
  justify-content: space-between;
}
.tag-progress p span {
  color: #b4b4b4;
}
.tag-progress .progress {
  width: 100%;
  -webkit-appearance: none;
  appearance: none;
  border: none;
  border-radius: 10px;
  height: 10px;
}
.tag-progress .progress::-webkit-progress-bar, .tag-progress .progress::-webkit-progress-value {
  border-radius: 10px;
}
.tag-progress .progress--copyright::-webkit-progress-bar {
  background-color: #ecd8e6;
}
.tag-progress .progress--copyright::-webkit-progress-value {
  background: #d459e8;
}
.tag-progress .progress--illustration::-webkit-progress-bar {
  background-color: #dee7e3;
}
.tag-progress .progress--illustration::-webkit-progress-value {
  background-color: #46bd84;
}
.tag-progress .progress--design::-webkit-progress-bar {
  background-color: #d8e7f4;
}
.tag-progress .progress--design::-webkit-progress-value {
  background-color: #08a0f7;
}

.task-activity h2 {
  font-size: 16px;
  margin-bottom: 1rem;
}
.task-activity li {
  list-style: none;
  margin: 1rem 0;
  padding: 0rem 1rem 1rem 3rem;
  position: relative;
}
.task-activity time {
  display: block;
  color: var(--light-grey);
}

.task-icon {
  width: 30px;
  height: 30px;
  border-radius: 100rem;
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}
.task-icon svg {
  font-size: 12px;
  color: var(--white);
}
.task-icon--attachment {
  background-color: #fba63c;
}
.task-icon--comment {
  background-color: #5dc983;
}
.task-icon--edit {
  background-color: #7784ee;
}

@media only screen and (max-width: 1300px) {
  .project {
    max-width: 100%;
  }

  .task-details {
    width: 100%;
    display: flex;
  }

  .tag-progress,
.task-activity {
    flex-basis: 50%;
    background: var(--white);
    padding: 1rem;
    border-radius: 8px;
    margin: 1rem;
  }
}
@media only screen and (max-width: 1000px) {
  .project-column:nth-child(2),
.project-column:nth-child(3) {
    display: none;
  }

  .project-tasks {
    grid-template-columns: 1fr 1fr;
  }
}
@media only screen and (max-width: 600px) {
  .project-column:nth-child(4) {
    display: none;
  }

  .project-tasks {
    grid-template-columns: 1fr;
  }

  .task-details {
    flex-wrap: wrap;
    padding: 3rem 1rem;
  }

  .tag-progress,
.task-activity {
    flex-basis: 100%;
  }

  h1 {
    font-size: 25px;
  }
}

.pagination-container .pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pagination-container .pagination li {
    list-style: none;
}

.pagination-container .pagination a {
    font-size: 18px; /* Adjust the font size as needed */
}

.pagination-container .pagination span {
    font-size: 18px; /* Adjust the font size as needed */
}

/* Additional styling for the arrows */
.pagination-container .pagination a[aria-label="Previous"] {
    margin-right: auto; /* Push the previous arrow to the left edge */
}

.pagination-container .pagination a[aria-label="Next"] {
    margin-left: auto; /* Push the next arrow to the right edge */
}
    </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>METROLOG</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{  'assets/vendors/feather/feather.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/css/vendor.bundle.base.css' }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ 'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css' }}">
  <link rel="stylesheet" href="{{ 'assets/vendors/ti-icons/css/themify-icons.css' }}">
  <link rel="stylesheet" type="text/css" href="{{ 'assets/js/select.dataTables.min.css' }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ 'assets/css/vertical-layout-light/style.css' }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
          @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Выход') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          @else
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
        </div>
      </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
          @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Выход') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          @else
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif

        </div>
      </nav>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item">
  <a class="nav-link" href="{{ url('/') }}">
 
    <span class="menu-title">Главная</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
   
    <span class="menu-title">Заявки</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="form-elements">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="{{ route('create.index') }}">Новая Заявка</a></li>
    </ul>
  </div>
      <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{ route('metrlog.index') }}">Мои Заявки</a></li>
          </ul>
      </div>
  
  
</li>
 </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
             
              <span class="menu-title">Инфо. Устройства</span>
              <i class="menu-arrow"></i>
            </a>    
            <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}">Девайсы</a></li>
            </ul>
          </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              
              <span class="menu-title">Инфо. Адреса</span>
              <i class="menu-arrow"></i>
            </a>    
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('addresses.index') }}">Адреса</a></li>
              </ul>
            </div>
             <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('applicationsandaddresses.index') }}">Заявки и Адреса</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
             
              <span class="menu-title">Котакт. Данные</span>
              <i class="menu-arrow"></i>
            </a>    
             <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('contacts.index') }}">Контакты</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
             
              <span class="menu-title">Админ. Данные</span>
              <i class="menu-arrow"></i>
            </a>    
             <div class="collapse" id="form-elements">
               <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('userrequisitessettings.index') }}">Реквезиты</a></li>
                </ul>
            </div>

            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('statustransitionsController.index') }}">Статусы</a></li>
                </ul>
            </div>
          </li>
</nav>
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Working version of https://dribbble.com/shots/14552329--Exploration-Task-Management-Dashboard -->
<!-- Working version of https://dribbble.com/shots/14552329--Exploration-Task-Management-Dashboard -->
<div class='app'>
  <main class='project'>
    <div class='project-info'>
    </div>
    <div class='project-tasks'>
      <div class='project-column'>
        <div class='project-column-heading'>
          <h2 class='project-column-heading__title'>Новая</h2><button class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
        </div>
        @foreach($appAndAddress as $application)
        <div class='task' draggable='true'>
            <div class='task__header'>
                <button class='task__options'><i class="fas fa-ellipsis-h"></i></button>
            </div>
            
            <div class='task__content'>
                <div class='task__info'>
                    <span><strong>ФИО:</strong> {{ $application->fullname }}</span>
                    <span><strong><br>Адрес:</strong> {{ $application->address }}</span>
                </div>
            </div>

            <div class='task__footer'>
                <div class='task__stats'>
                    <p></p>
                    <span><strong>ID:</strong> {{ $application->application_id }}</span>
                </div>
            </div>
        </div>
    @endforeach
    {{ $appAndAddress->links('pagination::default') }}
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--design'>UI Design</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Icon di section our services</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>2</span>
            <span><i class="fas fa-paperclip"></i>5</span>
           
          </div>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--copyright'>Copywriting</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Konsep hero title yang menarik</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>2</span>
            <span><i class="fas fa-paperclip"></i>3</span>
           
          </div>
        </div>
      </div>
      <div class='project-column'>
        <div class='project-column-heading'>
          <h2 class='project-column-heading__title'>В Графике</h2><button class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--design'>UI Design</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Replace lorem ipsum text in the final designs</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>5</span>
            <span><i class="fas fa-paperclip"></i>5</span>
           
          </div>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Create and generate the custom SVG illustrations.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>8</span>
            <span><i class="fas fa-paperclip"></i>7</span>
           
          </div>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--copyright'>Copywriting</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Proof read the legal page and check for and loopholes</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>12</span>
            <span><i class="fas fa-paperclip"></i>11</span>
           
          </div>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Create the landing page graphics for the hero slider.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>4</span>
            <span><i class="fas fa-paperclip"></i>8</span>
           
          </div>
        </div>
      </div>
      <div class='project-column'>
        <div class='project-column-heading'>
          <h2 class='project-column-heading__title'>На Доработку</h2><button class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--copyright'>Copywriting</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Check the company we copied doesn't think we copied them.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>4</span>
            <span><i class="fas fa-paperclip"></i>0</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--design'>UI Design</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Design the about page.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>0</span>
            <span><i class="fas fa-paperclip"></i>5</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Move that one image 5px down to make Phil Happy.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>2</span>
            <span><i class="fas fa-paperclip"></i>2</span>
           
          </div>
        </div>
      </div>
      <div class='project-column'>
        <div class='project-column-heading'>
          <h2 class='project-column-heading__title'>Истекает Срок</h2><button class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Send Advert illustrations over to production company.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>12</span>
            <span><i class="fas fa-paperclip"></i>5</span>
           
          </div>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Dawn wants to move the text 3px to the right.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>3</span>
            <span><i class="fas fa-paperclip"></i>7</span>
           
          </div>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--copyright'>Copywriting</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Amend the contract details.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>8</span>
            <span><i class="fas fa-paperclip"></i>16</span>
          </div>
        </div>
      </div>
      <div class='project-column'>
        <div class='project-column-heading'>
          <h2 class='project-column-heading__title'>Онлайн</h2><button class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--copyright'>Copywriting</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Check the company we copied doesn't think we copied them.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>4</span>
            <span><i class="fas fa-paperclip"></i>0</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--design'>UI Design</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Design the about page.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>0</span>
            <span><i class="fas fa-paperclip"></i>5</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Move that one image 5px down to make Phil Happy.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>2</span>
            <span><i class="fas fa-paperclip"></i>2</span>
           
          </div>
        </div>
      </div>
      <div class='project-column'>
        <div class='project-column-heading'>
          <h2 class='project-column-heading__title'>Истек Срок</h2><button class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--copyright'>Copywriting</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Check the company we copied doesn't think we copied them.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>4</span>
            <span><i class="fas fa-paperclip"></i>0</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--design'>UI Design</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Design the about page.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>0</span>
            <span><i class="fas fa-paperclip"></i>5</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Move that one image 5px down to make Phil Happy.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>2</span>
            <span><i class="fas fa-paperclip"></i>2</span>
           
          </div>
        </div>
      </div>
      <div class='project-column'>
        <div class='project-column-heading'>
          <h2 class='project-column-heading__title'>Завершена</h2><button class='project-column-heading__options'><i class="fas fa-ellipsis-h"></i></button>
        </div>

        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--copyright'>Copywriting</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Check the company we copied doesn't think we copied them.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>4</span>
            <span><i class="fas fa-paperclip"></i>0</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--design'>UI Design</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Design the about page.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>0</span>
            <span><i class="fas fa-paperclip"></i>5</span>
           
          </div>
        </div>
        <div class='task' draggable='true'>
          <div class='task__tags'><span class='task__tag task__tag--illustration'>Illustration</span><button class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
          <p>Move that one image 5px down to make Phil Happy.</p>
          <div class='task__stats'>
            <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>Nov 24</time></span>
            <span><i class="fas fa-comment"></i>2</span>
            <span><i class="fas fa-paperclip"></i>2</span>
          </div>
        </div>
      </div>
    </div>
  </main>
  <aside class='task-details'>
    <div class='tag-progress'>
      <h2>Task Progress</h2>
      <div class='tag-progress'>
        <p>Copywriting <span>3/8</span></p>
        <progress class="progress progress--copyright" max="8" value="3"> 3 </progress>
      </div>
      <div class='tag-progress'>
        <p>Illustration <span>6/10</span></p>
        <progress class="progress progress--illustration" max="10" value="6"> 6 </progress>
      </div>
      <div class='tag-progress'>
        <p>UI Design <span>2/7</span></p>
        <progress class="progress progress--design" max="7" value="2"> 2 </progress>
      </div>
    </div>
    <div class='task-activity'>
      <h2>Recent Activity</h2>
      <ul>
        <li>
          <span class='task-icon task-icon--attachment'><i class="fas fa-paperclip"></i></span>
          <b>Andrea </b>uploaded 3 documents
          <time datetime="2021-11-24T20:00:00">Aug 10</time>
        </li>
        <li>
          <span class='task-icon task-icon--comment'><i class="fas fa-comment"></i></span>
          <b>Karen </b> left a comment
          <time datetime="2021-11-24T20:00:00">Aug 10</time>
        </li>
        <li>
          <span class='task-icon task-icon--edit'><i class="fas fa-pencil-alt"></i></span>
          <b>Karen </b>uploaded 3 documents
          <time datetime="2021-11-24T20:00:00">Aug 11</time>
        </li>
        <li>
          <span class='task-icon task-icon--attachment'><i class="fas fa-paperclip"></i></span>
          <b>Andrea </b>uploaded 3 documents
          <time datetime="2021-11-24T20:00:00">Aug 11</time>
        </li>
        <li>
          <span class='task-icon task-icon--comment'><i class="fas fa-comment"></i></span>
          <b>Karen </b> left a comment
          <time datetime="2021-11-24T20:00:00">Aug 12</time>
        </li>
      </ul>
    </div>
  </aside>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

var dragSrcEl = null;

function handleDragStart(e) {
  this.style.opacity = '0.1';
  this.style.border = '3px dashed #c4cad3';
  
  dragSrcEl = this;

  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault();
  }

  e.dataTransfer.dropEffect = 'move';
  
  return false;
}

function handleDragEnter(e) {
  this.classList.add('task-hover');
}

function handleDragLeave(e) {
  this.classList.remove('task-hover');
}

function handleDrop(e) {
  if (e.stopPropagation) {
    e.stopPropagation(); // stops the browser from redirecting.
  }
  
  if (dragSrcEl != this) {
    dragSrcEl.innerHTML = this.innerHTML;
    this.innerHTML = e.dataTransfer.getData('text/html');
  }
  
  return false;
}

function handleDragEnd(e) {
  this.style.opacity = '1';
  this.style.border = 0;
  
  items.forEach(function (item) {
    item.classList.remove('task-hover');
  });
}


let items = document.querySelectorAll('.task'); 
items.forEach(function(item) {
  item.addEventListener('dragstart', handleDragStart, false);
  item.addEventListener('dragenter', handleDragEnter, false);
  item.addEventListener('dragover', handleDragOver, false);
  item.addEventListener('dragleave', handleDragLeave, false);
  item.addEventListener('drop', handleDrop, false);
  item.addEventListener('dragend', handleDragEnd, false);
});
});
    </script>

<script src="{{ 'assets/vendors/js/vendor.bundle.base.js' }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ 'assets/vendors/chart.js/Chart.min.js' }}"></script>
  <script src="{{ 'assets/vendors/datatables.net/jquery.dataTables.js' }}"></script>
  <script src="{{ 'assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js' }}"></script>
  <script src="{{ 'assets/js/dataTables.select.min.js' }}"></script>
  <!-- inject:js -->
  <script src="{{ 'assets/js/off-canvas.js' }}"></script>
  <script src="{{ 'assets/js/hoverable-collapse.js' }}"></script>
  <script src="{{ 'assets/js/template.js' }}"></script>
  <script src="{{ 'assets/js/settings.js' }}"></script>
  <script src="{{ 'assets/js/todolist.js' }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ 'assets/js/dashboard.js' }}"></script>
  <script src="{{ 'assets/js/Chart.roundedBarCharts.js' }}"></script>