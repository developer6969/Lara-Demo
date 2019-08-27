<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Clinic Doc Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                appdata: {},
            };
        },
        methods: {
            loadClinicdoc() {
                axios.get("api/clinicdoc")
				.then(({ data }) => {
					(this.appdata = data)
				});
            }
        },
        created() {
            this.loadClinicdoc();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
