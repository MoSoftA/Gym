<template>
    <div class="my-5 py-5" id="Trainer">
        <div class="container">
            <p class="h1">مدربينا الخبراء</p>
            <hr />
            <div class="row">

                <div class="col-md-4 col-sm-12 mb-3" :key="index" v-for="(trainer, index) in traniners">
                    <div class="overlay">
						<img class="img-fluid" :src="trainer.image" />
                        <div class="middle d-flex justify-content-center align-items-center">
                            <div class="text">
                                <p class="h2 mb-2">{{ trainer.name }}</p>
                                <p> {{ trainer.info }} </p>
                                <p> للتواصل: {{ trainer.phone }} </p>
                                <p> أو: {{ trainer.email }} </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    #Trainer {
        background-color: #ddd;
    }

    .container {
        &>p {
            text-align: center
        }

        hr {
            width: 10%;
            left: 0;
        }

        .overlay {
            &:hover {
                background-color: rgba(242, 58, 46, 0.8);

                img {
                    opacity: 0.3;
                }

                .middle {
                    opacity: 0.8;
                }
            }

            img {
                opacity: 1;
                display: block;
                width: 100%;
                height: auto;
                transition: .5s ease;
                backface-visibility: hidden;
            }

            .middle {
                color: white;
                transition: .5s ease;
                opacity: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;

                .text {
                    p {
                        max-width: 50%;
                        margin: auto;
                    }
                }
            }
        }
    }

</style>

<script>
import Axios from "axios";
export default {
	data(){
		return {
			traniners: []
		}
	},
	mounted(){
		Axios.get('api/getTrainers').then(
			res => {
				this.traniners =  res.data.data
			}
		).catch(err => console.log(err))
	}
}
</script>