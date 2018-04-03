CREATE TABLE `sb_agents` (
  `agn_id` bigint(11) AUTO_INCREMENT NOT NULL,
  `agn_code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,  
  `agn_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `agn_username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `agn_password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `agn_phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `agn_createdon` date NOT NULL,
  `agn_updatedon` date NOT NULL,
  `agn_geocode` varchar(255) COLLATE utf8_unicode_ci,
  `agn_city` varchar(50) COLLATE utf8_unicode_ci,
  `agn_country` varchar(50) COLLATE utf8_unicode_ci,
  `agn_region` varchar(50) COLLATE utf8_unicode_ci,
  `agn_rel_id` bigint(11),
  `agn_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  	PRIMARY KEY (agn_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `sb_agents_relationship` (
  `agn_rel_id` bigint(11) AUTO_INCREMENT NOT NULL,	
  `agn_id` bigint(11) NOT NULL,
  `agn_id_parent` bigint(11),
  `agn_relationship_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  	PRIMARY KEY (agn_rel_id),
    FOREIGN KEY (agn_id) REFERENCES sb_agents(agn_id),
    FOREIGN KEY (agn_id_parent) REFERENCES sb_agents(agn_id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `sb_agents_transactions` (
  `agn_trans_id` bigint(11) AUTO_INCREMENT NOT NULL, 
  `agn_id` bigint(11) NOT NULL,
  `agn_trans_amount` varchar(60),
  `agn_trans_on` date NOT NULL,
  `agn_trans_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  	PRIMARY KEY (agn_trans_id),
    FOREIGN KEY (agn_id) REFERENCES sb_agents(agn_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE sb_agents
ADD FOREIGN KEY (agn_rel_id) REFERENCES sb_agents_relationship(agn_rel_id);

CREATE TABLE IF NOT EXISTS  `ci_sessions` (
  session_id varchar(40) DEFAULT '0' NOT NULL,
  ip_address varchar(45) DEFAULT '0' NOT NULL,
  user_agent varchar(120) NOT NULL,
  last_activity int(10) unsigned DEFAULT 0 NOT NULL,
  user_data text NOT NULL,
  PRIMARY KEY (session_id),
  KEY `last_activity_idx` (`last_activity`)
);
