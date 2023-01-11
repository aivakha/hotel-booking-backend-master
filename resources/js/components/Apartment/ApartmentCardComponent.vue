<template>
    <article class="tour-box style-1">
        <!-- Single Tour -->
        <div class="tour-box-image">
            <figure>
                <router-link :to="{name: 'apartments.show', params: {slug: apartment.slug}}">
                    <img :src="apartment.preview_image" class="img-responsive listing-box-img" alt="">
                    <div class="list-overlay"></div>
                </router-link>
                <h4 class="destination-place">
                    <router-link :to="{name: 'apartments.show', params: {slug: apartment.slug}}">
                        {{ apartment.title }}
                    </router-link>
                </h4>
            </figure>
        </div>
        <div class="entry-meta">
            <div class="meta-item meta-author">
                <div class="coauthors">
                                    <span class="vcard author">
                                    <span class="fn">
                                    <a v-if="apartment.manager" href="#">
                                        <img alt="" src="/assets/client/img/no-user-img.jpg" class="avatar avatar-24" height="24" width="24">
                                        {{ apartment.manager.last_name }} {{ apartment.manager.first_name }}
                                    </a>
                                    </span>
                                    </span>
                </div>
            </div>
            <div class="meta-item meta-comment fl-right">
                <i class="ti-comment-alt"></i><span>{{ apartment.comments.length }}</span>
            </div>
            <div class="meta-item meta-rating fl-right">
                <i v-for="n in apartment.star_rate" class="fa fa-star"></i>
            </div>
        </div>
        <div class="inner-box">
            <div class="box-inner-ellipsis">
                <h4 class="entry-title">
                    <a href="#">{{ apartment.city.title }}</a>
                </h4>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    name: "ApartmentCardComponent",
    props: {
        apartment: {
            type: Object
        }
    },
}
</script>

<style scoped>

</style>
