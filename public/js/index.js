if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href)
}

const icon_burger = document.querySelector('.header__mobile-burger-icon')
const icon_close = document.querySelector('.header__mobile-close-icon')
const drop_down = document.querySelector('.mobile__menu-list')
const header = document.querySelector('.header')
const about_Us_Link = document.querySelector('.item-link-about')
const rooms_Link = document.querySelector('.item-link-rooms')
const offers_Link = document.querySelector('.item-link-offers')
const contact_Link = document.querySelector('.item-link-contact')

if (window.location.href.includes('about-us')) {
    about_Us_Link.classList.toggle('active')
}
if (window.location.href.includes('rooms')) {
    rooms_Link.classList.toggle('active')
}
if (window.location.href.includes('offers')) {
    offers_Link.classList.toggle('active')
}
if (window.location.href.includes('contact')) {
    contact_Link.classList.toggle('active')
}

icon_burger.addEventListener('click', () => {
    icon_burger.classList.toggle('hide')
    icon_close.classList.toggle('show')
    drop_down.classList.toggle('show')
})
icon_close.addEventListener('click', () => {
    icon_burger.classList.toggle('hide')
    icon_close.classList.toggle('show')
    drop_down.classList.toggle('show')
})

window.addEventListener('load', () => {
    window.pageYOffset > 99 ? header.classList.add('header--hide-on-top') :
        header.classList.remove('header--hide-on-top')
    if (window.innerWidth >= 1200) {
        runDesktopView()
    } else if (window.innerWidth >= 1000) {
        destroyRestaurantSwiper()
    } else {
        runDevicesView()
    }
})

window.addEventListener('resize', () => {
    if (window.innerWidth >= 1200) {
        runDesktopView(),
            destroyFeaturesSwiper()
    } else if (window.innerWidth >= 1000) {
        destroyRestaurantSwiper()
    }
    else {
        runDevicesView()
    }
})

const runDesktopView = () => {
    header.classList.add('header--desktop')
}
const runDevicesView = () => {
    header.classList.remove('header--desktop')
}

window.addEventListener('mousemove', (e) => {
    if (e.clientY <= 100) {
        header.classList.remove('header--hide-on-top')
    }
})

window.addEventListener('scroll', () => {
    const verticalSizeScrollBar = window.pageYOffset
    const shouldHideOnTop = verticalSizeScrollBar > 99

    header.classList.toggle('header--hide-on-top', shouldHideOnTop)
})

function initializeSwiper(selector, options) {
    return new Swiper(selector, options)
}

function destroySwiper(swiperInstance) {
    if (swiperInstance !== undefined) swiperInstance.destroy(true, true)
}

// Home Rooms Swiper
const swiperHomeRooms = initializeSwiper('.home-swiper-rooms', {
    centeredSlides: true,
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    speed: 500,
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        720: {
            slidesPerView: 1.5,
        },
        1000: {
            slidesPerView: 1.5,
        },
        1200: {
            slidesPerView: 2,
        },
    },
})

// Offer Rooms Swiper
const swiperRoomsOffer = initializeSwiper('.swiper-rooms-offer', {
    centeredSlides: true,
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    speed: 500,
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        720: {
            slidesPerView: 1.5,
            spaceBetween: 20,
        },
        1000: {
            slidesPerView: 1.5,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
})

// Features Swiper
let swiperFeatures = initializeSwiper('.swiper-features', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    pagination: {
        el: ".swiper-pagination",
    },
    breakpoints: {
        720: {
            slidesPerView: 2,
        },
        1000: {
            slidesPerView: 3,
        }
    },
})

// Restaurant Photos Swiper
let swiperRestaurantPhotos = initializeSwiper('.swiper-restaurant-photos', {
    direction: 'horizontal',
    loop: true,
    spaceBetween: 20,
    slidesPerView: 1,
    pagination: {
        el: ".swiper-pagination",
    },
    breakpoints: {
        720: {
            slidesPerView: 2,
        },
        1000: {
            slidesPerView: 3,
        }
    },
})

// Food Menu Swiper
const swiperFoodMenu = initializeSwiper('.swiper-food-menu', {
    direction: 'horizontal',
    slidesPerView: 1,
    loop: false,
    spaceBetween: 40,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        1000: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
    },
})

// Fun Fact Swiper
const swiperFunFact = initializeSwiper('.swiper-fun-fact', {
    direction: 'horizontal',
    loop: false,
    pagination: {
        el: ".swiper-pagination-fun",
    },
    breakpoints: {
        1000: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
})

// Rooms Cards Swiper
const swiperRoomsCards = initializeSwiper('.swiper-rooms-cards', {
    direction: 'horizontal',
    loop: false,
    pagination: {
        el: ".swiper-pagination-rooms-cards",
        clickable: true,
        renderBullet: (index, className) => {
            return '<span class="' + className + '">' + (index + 1) + "</span>"
        },
    },
    navigation: {
        nextEl: '.swiper-button-next-rooms-cards',
        prevEl: '.swiper-button-prev-rooms-cards',
    },
    breakpoints: {
        1000: {
            slidesPerView: 3,
            slidesPerGroup: 3,
            slidesPerColumn: 3,
            spaceBetween: 20,
            slidesPerColumnFill: 'column',
            grid: {
                fill: 'row',
                rows: 3,
            }
        },
    },
})

// Details Cards Swiper
const swiperDetailsCards = initializeSwiper('.swiper-details-cards', {
    direction: 'horizontal',
    loop: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
})

// Functions to destroy Swiper instances when needed
function destroyFeaturesSwiper() {
    if (swiperFeatures) {
        swiperFeatures.destroy()
        swiperFeatures = undefined
    }
}

function destroyRestaurantSwiper() {
    if (swiperRestaurantPhotos) {
        swiperRestaurantPhotos.destroy()
        swiperRestaurantPhotos = undefined
    }
}
