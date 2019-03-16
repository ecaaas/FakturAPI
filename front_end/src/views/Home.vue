<template>
	<div class="home">
		<b-container class="mt-5">
			<router-link to="/buy">Beli Barang -></router-link>

			<b-table responsive hover :items="data_faktur" :fields="data_faktur_field">
				<template slot="index" slot-scope="data">
					{{ data.index + 1 }}
				</template>
				<template slot="id" slot-scope="data">
					<b-button variant="warning" @click="edit(data.value)">Edit</b-button>
					&nbsp;
					<b-button variant="danger" @click="hapus(data.value)">Hapus</b-button>
				</template>
			</b-table>
		</b-container>
	</div>
</template>

<script>

import { api } from '@/helpers/api'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

export default {
	name: 'home',
	data() {
		return {
			data_faktur: [],
			data_faktur_field: [
				{ key: 'nama_barang', label: 'Nama Barang' },
				{ key: 'harga', label: 'Harga' },
				{ key: 'qty', label: 'Qty' },
				{ key: 'total', label: 'Total' },
				{ key: 'id', label: 'Aksi' }
			]
		}
	},
	mounted() {
		this.get()
	},
	methods: {
		get() {
			api.get('faktur').then((res) => {
				if (res.data.status == 'success') {
					this.data_faktur = res.data.result
				}
			})
		},
		hapus(id) {
			api.delete('/faktur/' + id).then(() => {
				console.log('delete success !')
				this.get()
			})
		},
		edit(id) {
			api.get('faktur/' + id).then(() => {
				this.$router.push('/buy/detail/' + id + '/edit')
			})
		}
	}
}

</script>
