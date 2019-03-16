<template>
	<b-container class="my-5">

		<div class="d-flex justify-content-around">

			<b-card
				no-body
				style="max-width: 20rem;"
				:img-src="choosen.image"
				img-alt="Image"
				img-top
				v-show="show"
			>
				<h4 slot="header">{{ choosen.type }}</h4>

				<b-card-body>
					<b-card-text>
						{{ choosen.spec }} <br>
						Rp. {{ choosen.price }} <br>
						<b-row class="mt-3">
							<b-col sm="3">
								<label for="qty">Qty :</label>
							</b-col>
							<b-col sm="9">
								<b-form-input id="qty" type="number" v-model="choosen.qty" />
							</b-col>
						</b-row>
					</b-card-text>
				</b-card-body>

				<b-card-body>
					<b-btn class="primary" @click="submitProduct()">Buy</b-btn>
				</b-card-body>
			</b-card>

		</div>

	</b-container>
</template>

<script>
	import { api } from '@/helpers/api'

	export default {
		data() {
			return {
				choosen: [],
				data: {
					nama_barang: "",
					harga: "",
					qty: "",
					total: ""
				},
				show: false
			}
		},
		mounted() {
			if (this.$route.params.edit == 'edit') {
				api.get('/faktur/' + this.$route.params.id).then((res) => {
					this.choosen.type = res.data.result[0].nama_barang
					this.choosen.qty = res.data.result[0].qty
					this.choosen.id = this.$route.params.edit

					this.getProduct(null, this.choosen.type)
				})
			} else {
				this.getProduct(this.$route.params.id, null)
			}
		},
		methods: {
			getProduct(id = null, type = null)
			{
				if (id == 1 || type == 'Samsung Galaxy M20') {
					this.choosen.image = 'https://images.samsung.com/is/image/samsung/id-galaxy-m20-sm-m205gdadxid-lperspectiveebonyblack-thumb-144503170?$PD_SHOP_GALLERY_THUM_PNG$'
					this.choosen.type = 'Samsung Galaxy M20'
					this.choosen.spec = '4/64 GB, Snapdragon 660, Front Camera 40mp, Android 9.0, Type-C'
					this.choosen.price = '2700000'

					this.show = true
				} else if (id == 2 || type == 'Vivo V15') {
					this.choosen.image = 'https://www.91-img.com/pictures/132721-v8-vivo-v15-pro-mobile-phone-large-1.jpg'
					this.choosen.type = 'Vivo V15'
					this.choosen.spec = '4/64 GB, Snapdragon 855, Front Camera 23mp, Android 9.0, Type-C'
					this.choosen.price = '4000000'

					this.show = true
				} else if (id == 3 || type == 'Realme 3') {
					this.choosen.image = 'https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_940,h_540/https://www.techparameter.com/wp-content/uploads/2019/03/realme.png'
					this.choosen.type = 'Realme 3'
					this.choosen.spec = '4/64 GB, Helio P60, Front Camera 13mp, Android 9.0, Type-C'
					this.choosen.price = '1700000'

					this.show = true
				}
			},
			submitProduct()
			{
				this.data.nama_barang = this.choosen.type
				this.data.harga = this.choosen.price
				this.data.qty = this.choosen.qty
				this.data.total = this.choosen.price * this.choosen.qty

				let data = this.data
				let url = null

				if (this.$route.params.edit == 'edit') {
					url = 'faktur/' + this.$route.params.id
				} else {
					url = 'faktur'
				}

				api.post(url, data).then(() => {
					this.$router.push('/')
				})
			}
		}
	}
</script>