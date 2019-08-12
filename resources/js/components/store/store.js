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
            password: '',
            subscription: {
                start: 0 ,
                end: 0,
            },
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
        inp: false,
        loged: false,
        // Start Admin Panel
        AdminPanel: {
            currentPage: 'NavEdit',
            loged: false ,
            token: '',
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
            {
                id: 2,
                img: 'https://imgplaceholder.com/420x320',
				title: 'This is headerd',
				body: 'This is body This is body This is body This is body This is body',
				info: 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...',
            },
            {
                id: 3,
                img: 'https://imgplaceholder.com/420x320',
				title: 'This is headerd',
				body: 'This is body This is body This is body This is body This is body',
				info: 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...',
            },
            {
                id: 4,
                img: 'https://imgplaceholder.com/420x320',
				title: 'This is headerd',
				body: 'This is body This is body This is body This is body This is body',
				info: 'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...',
            }
        ],
        // Start Tasks
        tasks: [
            
            {day: 0, lists: ['Some thing98','Some thing15','Some thing1']},
            {day: 1, lists: ['Some thing98','Some thing15','Some thing2']},
            {day: 2, lists: ['Some thing98','Some thing15','Some thing3']},
            {day: 3, lists: ['Some thing98','Some thing15','Some thing4']},
            {day: 4, lists: ['Some thing98','Some thing15','Some thing5']},
            {day: 5, lists: ['Some thing98','Some thing15','Some thing6']},
     
        ]
    },
    mutations:{
        // Check if loged
        loged: state => {
            state.loged = !state.loged;
        },
        changeRegisterState: (state, payload) => {
            state.inp = (payload=='l') ? false : true
        },
        // Get User
        get_user_name: (state, value) => {
            state.user.name = value;
        },
        get_user_email: (state, value) => {
            state.user.email = value;
        },
        get_user_password: (state, value) => {
            state.user.password = value;
        },
        change_current_page: (state, payload) => {
            state.AdminPanel.currentPage = payload
         },
        subscriptionDateStart: (state, payload) => {
            state.user.subscription.start = payload
        },
        subscriptionDateEnd: (state, payload) => {
            state.user.subscription.end = payload
        },
        Edit_Navbar: (state, payload) => {
            Object.assign(state.sections.navbar, payload)
        }
        // Edit_Navbar: (state, payload, value) => {
        //     if( payload == 'text'){
        //         state.sections.Navbar.logo.name == value
        //     } else if (payload == 'bgcolor'){
        //         state.sections.Navbar.colors.background == value
        //     }
        // }
    },
    getters: {
        article: (state) => (id) => {
            return state.articles.filter(function(v){ return v["id"] == id })
        }
    }
});