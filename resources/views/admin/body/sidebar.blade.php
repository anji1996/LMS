 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#students" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Enroled students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="students" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{route('all.studentEnroled')}}">
              <i class="bi bi-circle"></i><span>All Students enrolled</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Course List</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{route('all.course')}}">
              <i class="bi bi-circle"></i><span>All Courses</span>
            </a>
          </li>
           <li>
            <a href="{{route('add.course')}}">
              <i class="bi bi-circle"></i><span>Add Courses</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Lessons List</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{route('all.lesson')}}">
              <i class="bi bi-circle"></i><span>All Lessons</span>
            </a>
          </li>
           <li>
            <a href="{{route('add.lesson')}}">
              <i class="bi bi-circle"></i><span>Add Lesson</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->



    </ul>

  </aside>
