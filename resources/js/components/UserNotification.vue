<template>
   <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i>
                <span class="badge rounded-pill" v-if="unreadCount > 0">{{unreadCount}}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                </div>
                <div class="noti-content" v-if="unreadCount > 0">
                    <ul class="notification-list">
                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <li class="notification-message" v-for="item in unread" :key="item.id">
                                <a :href="`edit-comment/${item.data.id}`" @click="readNotifications(item)">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm">
                                        <img  class="avatar-img rounded-circle" alt="" src="/assets/img/comment.png" >


                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span
                                                    class="noti-title">{{ $notification->data['title'] }}</span>
                                                {{ $notification->data['body'] }}
                                            </p>
                                            <p class="noti-time"><span
                                                    class="notification-time">{{ $notification->created_at }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach



                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activities.html">View all Notifications</a>
                </div>
            </div>
        </li>
</template>

<script>
    export default {
        data: function () {
            return {
                read: {},
                unread: {},
                unreadCount: 0
            }
        },
        created: function () {
            this.getNotifications();
            let userId = $('meta[name="userId"]').attr('content');
            Echo.private('App.User.' + userId)
                .notification((notification) => {
                    this.unread.unshift(notification);
                    this.unreadCount++;
                });
        },
        methods: {
            getNotifications() {
                axios.get('user/notifications/get').then(res => {
                    this.read = res.data.read;
                    this.unread = res.data.unread;
                    this.unreadCount = res.data.unread.length;
                }).catch(error => Exception.handle(error))
            },
            readNotifications(notification) {
                axios.post('user/notifications/read', {id: notification.id}).then(res => {
                    this.unread.splice(notification,1);
                    this.read.push(notification);
                    this.unreadCount--;
                })
            }
        }
    }
</script>
