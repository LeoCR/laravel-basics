<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="#" v-on:click="load">Ver Respuestas</a>
                <div class="card" v-for="response in responses">
                        <div class="card-block">
                            {{ response.message }}
                        </div>
                        <div class="card-footer text-muted">
                            {{ response.created_at }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
	props: ['message'],
	data() {
		return {
			responses: []
		}
	},

	methods: {
		load() {
			axios.get('/api/messages/' + this.message + '/responses')
				.then(res => {
					this.responses = res.data;
				});
		}
	}
}
</script>
