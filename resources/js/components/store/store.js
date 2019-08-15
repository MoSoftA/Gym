import Vue from "vue";
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state:{
        user: {
            id: 0,
            name: '',
            email: '',
            admin: false,
            subscription: {
                start: 0 ,
                end: 0,
            },
            loged: false,
            token: ''
        },
        sections:{
            navbar: {
                logo: {
                    text: '',
                    img: ''
                },
                color: {
                    bg: '',
                    bf: '',
                    font: '',
                    active: ''
                }
            }
        },
        
        currentPage: 'dashboard',
        // Start Admin Panel
        AdminPanel: {
            userEdit: {
                name: '',
                email: '',
                password: '',
                date_start: '',
                date_end: '',
            }
        },
        // Start Articles
        articles:[
            {
                id: 1,
                img: 'https://imgplaceholder.com/420x320',
				title: ' نموذج لوريم ايبسوم عربي',
				body: '<p><p><b>لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور</b></p><p><b>أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد</b></p><p><b>أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس</b></p><p><b><i>أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت</i></b></p><p><b>نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا</b></p><p><b>كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم."</b></p><b></b><p><ul><li>ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد</li><li><p>ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد</p>ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد<br></li><li><p>ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد</p><br><br></li></ul></p><br><br></p>',
				info: 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...',
            },
            
        ],
        // Start Tasks
        tasks: [
            
            {day: "Saturday", lists: ['Some thing98','Some thing15','Some thing1']},
            {day: "Sunday", lists: ['Some thing98','Some thing15','Some thing2']},
            {day: "Monday", lists: ['Some thing98','Some thing15','Some thing3']},
            {day: "Tuesday", lists: ['Some thing98','Some thing15','Some thing4']},
            {day: "Wednesday", lists: ['Some thing98','Some thing15','Some thing5']},
            {day: "Thursday", lists: ['Some thing98','Some thing15','Some thing6']},
     
        ]
    },
    mutations:{
        // Check if loged
        loged: state => {
            state.loged = !state.loged;
        },
        user(state, payload){
            Object.assign(state.user, payload)
        },
        change_current_page: (state, payload) => {
            state.currentPage = payload
         },
        Edit_Navbar: (state, payload) => {
            Object.assign(state.sections.navbar, payload)
        },
        got_articles: (state, payload) => {
            state.articles = payload
        }
    },
    getters: {
        article: (state) => (id) => {
            return state.articles.filter(function(v){ return v["id"] == id })
        }
    }
});