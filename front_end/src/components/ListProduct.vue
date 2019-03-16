<template>
	<b-container class="my-5">

		<h3 class="mb-3">Please choose one of the below product:</h3>

		<div class="d-flex justify-content-around">

			<b-card
				v-for="(produk) in phone"
				:key="produk.id"
				no-body
				style="max-width: 20rem;"
				:img-src="produk.image"
				img-alt="Image"
				img-top
			>
				<h4 slot="header">{{ produk.type }}</h4>

				<b-card-body>
					<b-card-text>
						{{ produk.spec }} <br>
						{{ produk.price }}
					</b-card-text>
				</b-card-body>

				<b-card-body>
					<b-btn class="primary" @click="getProduct(produk.id)">Choose</b-btn>
				</b-card-body>
			</b-card>

		</div>

	</b-container>
</template>

<script>
	export default {
		data() {
			return {
				phone: [
					{ id: '1', image: 'https://images.samsung.com/is/image/samsung/id-galaxy-m20-sm-m205gdadxid-lperspectiveebonyblack-thumb-144503170?$PD_SHOP_GALLERY_THUM_PNG$', type: 'Samsung Galaxy M20', spec: '4/64 GB, Snapdragon 660, Front Camera 40mp, Android 9.0, Type-C', price: '2700000' },
					{ id: '2', image: 'https://www.91-img.com/pictures/132721-v8-vivo-v15-pro-mobile-phone-large-1.jpg', type: 'Vivo V15', spec: '4/64 GB, Snapdragon 855, Front Camera 23mp, Android 9.0, Type-C', price: '4000000' },
					{ id: '3', image: 'https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_940,h_540/https://www.techparameter.com/wp-content/uploads/2019/03/realme.png', type: 'Realme 3', spec: '4/64 GB, Helio P60, Front Camera 13mp, Android 9.0, Type-C', price: '1700000' }
				]
			}
		},
		methods: {
			getProduct(id) {
				this.$router.push('/buy/detail/' + id)
			}
		}
	}
</script>