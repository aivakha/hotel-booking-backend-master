<template>
    <article class="tour-box style-1">
        <div class="tour-box-image">
            <figure>
                <router-link :to="{name: 'rooms.show', params: {slug: room.slug}}">
                    <img :src="room.preview_image" class="img-responsive listing-box-img" alt="">
                    <div class="list-overlay"></div>
                </router-link>
                <h4 class="destination-place">
                    <router-link :to="{name: 'rooms.show', params: {slug: room.slug}}">
                        {{ room.title }}
                    </router-link>
                </h4>
            </figure>
        </div>
        <div class="entry-meta">
            <div class="meta-item meta-author">
                <div class="coauthors">
            <span class="vcard author">
            <span class="fn">
            <a v-if="room.apartment.manager" href="#">
                 <img alt="" src="/assets/client/img/no-user-img.jpg" class="avatar avatar-24" height="24" width="24">
                {{ room.apartment.manager.last_name }} {{ room.apartment.manager.first_name }}
            </a>
            </span>
            </span>
                </div>
            </div>
            <div class="meta-item meta-comment fl-right">
                <i class="ti-comment-alt"></i><span>{{ room.apartment.comments.length }}</span>
            </div>
            <div class="meta-item meta-rating fl-right">
                <i v-for="n in room.apartment.star_rate" class="fa fa-star"></i>
            </div>
        </div>
        <div class="inner-box">
            <div class="box-inner-ellipsis">
                <h4 class="entry-title">
                    <a href="#">{{ room.apartment.city.title }}</a>
                </h4>
                <div class="price-box">
                    <div class="tour-price fl-right">
                        <i class="ti ti-user"></i><span class="theme-cl f-bold">{{ room.price }} грн</span>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    name: "RoomCardComponent",
    props: {
        room: {
            type: Object
        }
    },

    data() {
        return {
            appUrl: this.baseUrl
        }
    },
}
</script>

<style scoped>

</style>
