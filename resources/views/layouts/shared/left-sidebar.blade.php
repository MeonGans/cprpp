<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Головне</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarNews" aria-expanded="false" aria-controls="sidebarNews"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Новини </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarNews">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('news_list') }}">Список новин</a>
                        </li>
                        <li>
                            <a href="{{ route('add_news') }}">Додати новину</a>
                        </li>
                        <li>
                            <a href="{{ route('categories_list') }}">Категорії</a>
                        </li>
                        <li>
                            <a href="{{ route('add_category') }}">Додати Категорію</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEvents" aria-expanded="false" aria-controls="sidebarEvents"
                   class="side-nav-link">
                    <i class="ri-calendar-todo-line"></i>
                    <span>Події</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEvents">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('events_list') }}">Список подій</a>
                        </li>
                        <li>
                            <a href="{{ route('add_event') }}">Додати подію</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Сторінки</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages"
                   class="side-nav-link">
                    <i class="ri-team-line"></i>
                    <span> Команда </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('members_list') }}">Список працівників</a>
                        </li>
                        <li>
                            <a href="{{ route('add_member') }}">Додати працівника</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
