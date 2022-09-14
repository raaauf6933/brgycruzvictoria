<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Services\ActivityLogService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogService $service)
    {
        $announcements = array(
            [
                'id' => 1,
                'title' => 'ALAGANG SK TIAONG, PANALO',
                'content' => '<h1><strong>ALAGANG SK TIAONG, PANALO</strong></h1><p>Umpisahan natin ng linggo na punong puno ng biyaya at kagalakan kasama ang bumubuo ng SK Tiaong sa pangunguna po ng inyong lingkod, Kaalinsabay ng pagdiriwang ng ika-48 na Buwan ng Nutrisyon nagsagawa po tayo ng Lingguhang Feeding Program para sa ating mga ka-barangay. </p>',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'BATANG Barangay Cruz, HANDA NA! LIGA NA! ',
                'content' => '<h1><strong>BATANG Barangay Cruz, HANDA NA! LIGA NA! </strong></h1>
                <p>Maraming Salamat po sa lahat ng mga sumaling kabataan sa ating barangay. Nawa ay maging masaya at maayos ang ating taunang paliga. 
                Good Luck sa lahat ng mga teams. God Bless! 
                Maraming Salamat din sa aking mga SK Officials na nagsaayos ng mga kaganapan upang mapaganda ang ating programa. </p>
                ',
                'created_at' => now()->subMonth()
            ],
            [
                'id' => 3,
                'title' => 'Digital Learning Commons',
                'content' => '<h1><strong>Digital Learning Commons</strong></h1><p>OVPRE is preparing for its own approach which we call OVPRE–DLC (Digital Learning Commons) and we will use the NUADU platform.
                This system was chosen for its usability and ability to conduct formative assessment and development learning approaches. OVPRE learners will benefit from automated adaptive training tailored to serve the learners’ needs, curriculum, and cognitive skills gaps. It is designed to support individual learning paths and provide formative, personalized feedback to learners, thereby increasing their proficiency and engagement in the process.</p>',
                'created_at' => now()->subMonth(2)
            ],
            [
                'id' => 4,
                'title' => 'NEW NORMAL NA NUTRISYON, SAMA-SAMANG GAWAN NG SOLUSYON',
                'content' => '<h1><strong>NEW NORMAL NA NUTRISYON, SAMA-SAMANG GAWAN NG SOLUSYON</strong></h1><p> Ang Sangguniang Kabataan ng Barangay Cruz ay nakikiisa  para sa pagdiriwang ng taunang Buwan ng Nutrisyon.</p>
                <p> Time: 08:00 AM - 10:00 AM</p>
                <p> Place: PNC Yes Cafeteria</p>
                ',
                'created_at' => now()->subMonth(2)
            ],
        );

        Announcement::insert($announcements);

        Announcement::all()->map(fn(
            $announcement) => $service->log_activity(model:$announcement, event:'added', model_name: 'Announcement', model_property_name: $announcement->title, conjunction:'an')
        );
    }
}
